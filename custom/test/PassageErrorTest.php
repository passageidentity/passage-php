<?php

namespace Passage\Test;

use Passage\Client\PassageError;
use PHPUnit\Framework\TestCase;
use OpenAPI\Client\ApiException;

class PassageErrorTest extends TestCase
{
    public function testFromApiException()
    {
        $apiException = new ApiException(
            code: 404,
            message: "Not Found",
            responseHeaders: [],
            responseBody: '{"code":"user_not_found","error":"User not found"}'
        );
        $passageError = PassageError::fromApiException($apiException);

        $this->assertEquals(404, $passageError->getStatusCode());
        $this->assertEquals("user_not_found", $passageError->getErrorCode());
        $this->assertEquals(
            "Passage\Client\PassageError: [404 user_not_found]: User not found\n",
            $passageError->getMessage(),
        );
    }
}
