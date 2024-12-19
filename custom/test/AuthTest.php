<?php

namespace Passage\Test;

use Dotenv\Dotenv;
use UnexpectedValueException;
use PHPUnit\Framework\TestCase;
use Passage\Client\Passage;

class AuthTest extends TestCase
{
    private $appId;
    private $apiKey;
    private $appToken;
    private $userId;
    private $passage;

    public function setUp(): void
    {
        parent::setUp();

        include __DIR__ . '/../../vendor/autoload.php';
        Dotenv::createUnsafeImmutable(__DIR__ . '/../../')->safeLoad();

        $this->appId = getenv('APP_ID');
        $this->apiKey = getenv('API_KEY');
        $this->appToken = getenv('EXAMPLE_AUTH_TOKEN');
        $this->userId = getenv('EXAMPLE_USER_ID');

        $this->passage = new Passage($this->appId, $this->apiKey);
    }

    public function testValidateJwtValidToken()
    {
        $userId = $this->passage->auth->validateJwt($this->appToken);
        $this->assertEquals($this->userId, $userId);
    }

    public function testValidateJwtInvalidTokenStructure()
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('Wrong number of segments');
        $this->passage->auth->validateJwt('incorrect.token');
    }
}
