<?php

namespace Passage\Client;

use OpenAPI\Client\ApiException;
use Exception;

class Authentication
{
    /**
     * @deprecated 1.0.0
     * @see Passage->auth
     *
     * Initialize a new Passage instance.
     *
     * @param Passage $passage
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(private Passage $passage)
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        $this->passage = $passage;
    }

    /**
     * @deprecated 1.0.0
     * @see Passage->auth->validateJwt
     *
     * Validate that a JWT is valid and return the Passage user ID associated with the token.
     *
     * @param string $jwtString The authentication token to be validated
     * @return string User ID of the Passage user
     */
    public function validateJWT(string $jwtString): string | null
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        try {
            return $this->passage->auth->validateJwt($jwtString);
        } catch (Exception $e) {
            throw new ApiException(
                "Could not verify token: {$e->getMessage()}",
                401
            );
        }
    }
}
