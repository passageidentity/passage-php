<?php

namespace Passage\Test;

use Dotenv\Dotenv;
use Passage\Client\CreateUserArgs;
use Passage\Client\UpdateUserArgs;
use PHPUnit\Framework\TestCase;
use Passage\Client\Passage;
use Passage\Client\PassageError;

class UserTest extends TestCase
{
    private $appId;
    private $apiKey;
    private $userId;
    private $passage;

    public function setUp(): void
    {
        parent::setUp();

        include __DIR__ . '/../vendor/autoload.php';
        Dotenv::createUnsafeImmutable(__DIR__ . '/..')->safeLoad();

        $this->appId = getenv('APP_ID');
        $this->apiKey = getenv('API_KEY');
        $this->userId = getenv('EXAMPLE_USER_ID');

        $this->passage = new Passage($this->appId, $this->apiKey);
    }

    public function testGetByIdentifierThrowsPassageError()
    {
        $this->expectException(PassageError::class);
        $this->passage->user->getByIdentifier('error@passage.id');
    }

    public function testCreate()
    {
        $expectedEmail = 'php@test.com';
        $args = new CreateUserArgs();
        $args->setEmail($expectedEmail);

        $actual = $this->passage->user->create($args);

        $this->assertEquals($expectedEmail, $actual->getEmail());

        $this->passage->user->delete($actual->getId());
    }

    public function testUpdate()
    {
        $expectedPhone = '+15125555555';
        $options = new UpdateUserArgs();
        $options->setPhone($expectedPhone);

        $actual = $this->passage->user->update($this->userId, $options);

        $this->assertEquals($expectedPhone, $actual->getPhone());
    }
}
