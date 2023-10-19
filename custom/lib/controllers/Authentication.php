<?php
namespace Passage\Client\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;
use GuzzleHttp\Psr7\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\CachedKeySet;
use Phpfastcache\CacheManager;

use OpenAPI\Client\ApiException;

require 'vendor/autoload.php';

class Authentication {
    private $passage;
    private $jwks;

    /**
     * Initialize a new Passage instance.
     * @param Passage $passage
     * 
     * @throws \InvalidArgumentException
     */
    public function __construct(Passage $passage) {
        $this->passage = $passage;

        $appId = $this->passage->getAppId();
        $jwtIssuer = 'https://auth.passage.id/v1/apps/' . $appId . '/.well-known/jwks.json';
        
        $this->jwks = $this->fetchJWKS($jwtIssuer);
    }
    
    /**
     * Returns the JWKS for the current app
     *
     * @param string $url
     * @return CachedKeySet UserId of the Passage user
    */
    private function fetchJWKS(string $url) {
        $httpClient = new Client();
        $httpFactory = new HttpFactory();

        $cacheItemPool = CacheManager::getInstance('files');

        $keySet = new CachedKeySet(
            $url,
            $httpClient,
            $httpFactory,
            $cacheItemPool,
            null,
            true
        );

        return $keySet;
    }

    /**
     * Authenticate request with a cookie, or header. If no authentication
     * strategy is given, authenticate the request via cookie (default
     * authentication strategy).
     *
     * @param Request $req HTTP request
     * @return string Userd of the Passage user
    */
    public function authenticateRequest(Request $req): string {
        if ($this->passage->authStrategy == 'HEADER') {
            return $this->authenticateRequestWithHeader($req);
        } else {
            return $this->authenticateRequestWithCookie($req);
        }
    }

    /**
     * Authenticate a request via the HTTP header.
     *
     * @param Request $req request
     * @return string User Id for Passage User
     * @throws ApiException for missing or incorrect tokens
    */
    public function authenticateRequestWithHeader(Request $req): string {
        $authorizationHeader = $req->getHeaders('Authorization');


        if (!$authorizationHeader) {
            throw new ApiException(
                'Header authorization not found. You must catch this error.',
                401
            );
        } else {
            $authToken = $authorizationHeader['Authorization'][0];
            $token = explode(' ', $authToken)[1] ?? null;
            $userId = $this->validAuthToken($token);

            if ($userId) {
                return $userId;
            } else {
                throw new ApiException(
                    'Auth token is invalid',
                    401
                );
            }
        }
    }

    /**
     * Authenticate a request via a cookie.
     *
     * @param Request $req request
     * @return string User Id for Passage User
     * @throws ApiException if a valid cookie for authentication is not found or if the auth token is invalid
    */
    public function authenticateRequestWithCookie(Request $req): string {
        $cookiesStr = $req->getHeaders()['cookies'][0] ?? null;

        if (!$cookiesStr) {
            throw new ApiException(
                "Could not find valid cookie for authentication. You must catch this error.",
                401
            );
        }

        $cookies = explode(';', $cookiesStr);
        $passageAuthToken = null;

        foreach ($cookies as $cookie) {
            $cookie = trim($cookie);
            $sepIdx = strpos($cookie, '=');

            if ($sepIdx === false) {
                continue;
            }

            $key = substr($cookie, 0, $sepIdx);
            if ($key !== 'psg_auth_token') {
                continue;
            }

            $passageAuthToken = substr($cookie, $sepIdx + 1);
            break;
        }

        if ($passageAuthToken) {
            $userId = $this->validAuthToken($passageAuthToken);

            if ($userId) {
                return $userId;
            } else {
                throw new ApiException(
                    "Could not validate auth token. You must catch this error.",
                    401
                );
            }
        } else {
            throw new ApiException(
                "Could not find authentication cookie 'psg_auth_token' token. You must catch this error.",
                401
            );
        }
    }

    /**
     * Determine if the provided token is valid when compared with its
     * respective public key.
     *
     * @param string Authentication token
     * @return string sub claim if the jwt can be verified, or Error
    */
    public function validAuthToken(string $jwtString): string | null {
        try {
            $decodedHeader = JWT::urlsafeB64Decode(explode('.', $jwtString)[0]);
            $header = json_decode($decodedHeader);

            $kid = $header->kid;

            if (!$kid) {
              return null;
            }

            $decodedToken = JWT::decode($jwtString, $this->jwks);
            

            $userID = $decodedToken->sub;
      
            if ($userID) {
              return strval($userID);
            } else {
              return null;
            }
          } catch (\Exception $e) {
            var_dump($e->getMessage());
            return null;
        }
    }
}

?>