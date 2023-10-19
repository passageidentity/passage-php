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
     * Determine if the provided token is valid when compared with its
     * respective public key.
     *
     * @param string Authentication token
     * @return string sub claim if the jwt can be verified, or Error
    */
    public function validateJWT(string $jwtString): string | null {
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
            return null;
        }
    }
}

?>