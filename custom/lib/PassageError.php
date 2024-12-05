<?php

namespace Passage\Client;

use Exception;
use OpenAPI\Client\ApiException;
use Throwable;

class PassageError extends Exception
{
    private function __construct(
        private readonly int $statusCode,
        private readonly string $errorCode,
        string $message,
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    public static function fromApiException(ApiException $e): PassageError
    {
        $error = json_decode($e->getResponseBody(), true);
        $statusCode = $e->getCode();
        $errorCode = $error['code'];
        $errorMessage = $error['error'];
        $message = __CLASS__ . ": [{$statusCode} {$errorCode}]: {$errorMessage}\n";
        return new PassageError(
            $statusCode,
            $errorCode,
            $message,
            $statusCode,
            $e,
        );
    }
}
