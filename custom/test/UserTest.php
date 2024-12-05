<?php

namespace Passage\Test;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use Passage\Client\Passage;
use Passage\Client\PassageError;

class UserTest extends TestCase
{
    private $appId;
    private $apiKey;
    private $passage;

    public function setUp(): void
    {
        parent::setUp();

        include __DIR__ . '/../../vendor/autoload.php';
        Dotenv::createUnsafeImmutable(__DIR__ . '/../../')->safeLoad();

        $this->appId = getenv('APP_ID');
        $this->apiKey = getenv('API_KEY');

        $this->passage = new Passage($this->appId, $this->apiKey);
    }

    public function testGetByIdentifierThrowsPassageError()
    {
        $this->expectException(PassageError::class);
        $this->passage->user->getByIdentifier('error@passage.id');
    }
}
