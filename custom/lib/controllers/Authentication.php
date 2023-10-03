<?php
namespace Passage\Client\Controllers;

use DateTimeImmutable;
use GuzzleHttp\Psr7\Request;
use Lcobucci\Clock\FrozenClock;
use Lcobucci\JWT\JwtFacade;
use Lcobucci\JWT\Encoding\ChainedFormatter;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Token\Builder;
use Lcobucci\JWT\Token\Parser;
use Lcobucci\JWT\Validation\Constraint\IssuedBy;
use Lcobucci\JWT\Validation\Constraint\SignedWith;
use Lcobucci\JWT\Validation\Constraint\StrictValidAt;
use Lcobucci\JWT\Validation\Constraint\ValidAt;
use Lcobucci\JWT\Validation\Validator;
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
        $url = 'https://auth.passage.id/v1/apps/' . $appId . '/.well-known/jwks.json';

        $now = new DateTimeImmutable();
        $key = InMemory::base64Encoded(
            'hiG8DlOKvtih6AxlZn5XKImZ06yu8I3mkOzaJrEuW8yAv8Jnkw330uMt8AEqQ5LB'
        );
        
        $this->jwks = (new JwtFacade())->issue(
            new Sha256(),
            $key,
            static fn (
                Builder $builder,
                DateTimeImmutable $issuedAt
            ): Builder => $builder
                ->issuedBy($url)
                ->expiresAt($now->modify('+24 hour'))
                ->withClaim('userID', 1)
        );

        var_dump($this->jwks);
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
        $authorization = $req->headers['authorization'] ?? null;

        if (!$authorization) {
            throw new ApiException(
                "Header authorization not found. You must catch this error.",
                401
            );
        } else {
            $authToken = explode(' ', $authorization)[1] ?? null;
            $userId = $this->validAuthToken($authToken);

            if ($userId) {
                return $userId;
            } else {
                throw new ApiException(
                    "Auth token is invalid",
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
        $cookiesStr = $req->getHeaders()['cookie'][0] ?? null;

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
    public function validAuthToken(string $jwtString): string {
        $userToken = (new Parser(new JoseEncoder()))->parse($jwtString);
        $validator = new Validator();

        $appId = $this->passage->getAppId();
        $issuer = 'https://auth.passage.id/v1/apps/' . $appId . '/.well-known/jwks.json';

        var_dump($validator->validate($userToken, new IssuedBy($issuer)));
    }
}

?>