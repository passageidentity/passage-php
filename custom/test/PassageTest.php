<?php

namespace Passage\Test;

use Dotenv\Dotenv;
use OpenAPI\Client\ApiException;
use PHPUnit\Framework\TestCase;
use OpenAPI\Client\HeaderSelector;
use OpenAPI\Client\Model\CreateMagicLinkRequest;
use OpenAPI\Client\Model\CreateUserRequest;
use OpenAPI\Client\Model\UpdateUserRequest;
use Passage\Client\Passage;

class PassageTest extends TestCase
{
    private $appId;
    private $apiKey;
    private $appToken;
    private $passageClient;
    private $userId;

    public function setUp(): void
    {
        parent::setUp();

        include __DIR__ . '/../../vendor/autoload.php';
        Dotenv::createUnsafeImmutable(__DIR__ . '/../../')->safeLoad();

        $this->appId = getenv('APP_ID');
        $this->apiKey = getenv('API_KEY');
        $this->appToken = getenv('EXAMPLE_AUTH_TOKEN');
        $this->userId = getenv('EXAMPLE_USER_ID');

        $this->passageClient = new Passage($this->appId, $this->apiKey);
    }

    public function testConstructorMissingParam()
    {
        $this->expectException(\ArgumentCountError::class);
        $this->expectExceptionMessage('Too few arguments to function Passage\Client\Passage::__construct()');

        new Passage('123456');
    }

    public function testPassageVersionHeader()
    {
        $headerSelector = new HeaderSelector();
        $headers = $headerSelector->selectHeaders(['application/json'], 'application/json', false);

        $this->assertMatchesRegularExpression('/^passage-php \d+\.\d+\.\d+$/', $headers['Passage-Version']);
    }

    public function testConstructorWithAppId()
    {
        $passage = new Passage('123456', '987654');

        // Assert that the object was created successfully
        $this->assertInstanceOf(Passage::class, $passage);

        // Assert that app_id and api_key properties are correctly set
        $this->assertEquals('123456', $passage->getAppId());
    }

    public function testGetApp()
    {
        $app = $this->passageClient->getApp();

        // Assert that app exists
        $this->assertEquals($this->appId, $app['id']);
    }

    public function testCreateMagicLink()
    {
        $magicLinkRequest = new CreateMagicLinkRequest(
            array(
            'email' => 'chris@passage.id',
            'channel' => 'email',
            'ttl' => 62
            )
        );

        $magicLink = $this->passageClient->createMagicLink($magicLinkRequest);

        // Assert that identifier and ttl properties are correctly set
        $this->assertEquals($magicLink['identifier'], 'chris@passage.id');
        $this->assertEquals($magicLink['ttl'], 62);
    }

    public function testCreateDeleteUser()
    {
        $userRequest = new CreateUserRequest(
            array(
            'email' => 'chris+test-create-delete@passage.id',
            'user_metadata' => array(
                'example1' => 'cool'
            )
            )
        );

        $user = $this->passageClient->createUser($userRequest);

        // Assert that email and metadata properties are correctly set
        $this->assertEquals($user['email'], 'chris+test-create-delete@passage.id');
        $this->assertEquals($user['user_metadata']['example1'], 'cool');

        // Assert that the created user is deleted successfully
        $this->assertEquals($this->passageClient->deleteUser($user['id']), null);
    }

    public function testGetUser()
    {
        $user = $this->passageClient->getUser($this->userId);

        // Assert that user exists
        $this->assertEquals($user['id'], $this->userId);
    }

    public function testGetUserByIdentifier()
    {
        $email = 'test-create@passage.id';
        $userRequest = new CreateUserRequest(
            array(
            'email' => $email,
            )
        );

        $createUser = $this->passageClient->createUser($userRequest);

        $user = $this->passageClient->getUser($createUser['id']);
        $this->assertEquals($user['id'], $createUser['id']);

        $userByIdentifier = $this->passageClient->getUserByIdentifier($email);
        $this->assertEquals($userByIdentifier['id'], $createUser['id']);

        $this->assertEquals($userByIdentifier, $user);
    }

    public function testGetUserByIdentifierUpperCase()
    {
        $email = 'test-create@passage.id';
        $userRequest = new CreateUserRequest(
            array(
            'email' => $email,
            )
        );

        $createUser = $this->passageClient->createUser($userRequest);

        $user = $this->passageClient->getUser($createUser['id']);
        $this->assertEquals($user['id'], $createUser['id']);

        $userByIdentifier = $this->passageClient->getUserByIdentifier(strtoupper($email));
        $this->assertEquals($userByIdentifier['id'], $createUser['id']);

        $this->assertEquals($userByIdentifier, $user);
    }

    public function testGetUserByIdentifierPhone()
    {
        $phone = '+15005550007';
        $userRequest = new CreateUserRequest(
            array(
            'phone' => $phone,
            )
        );

        $createUser = $this->passageClient->createUser($userRequest);

        $user = $this->passageClient->getUser($createUser['id']);
        $this->assertEquals($user['id'], $createUser['id']);

        $userByIdentifier = $this->passageClient->getUserByIdentifier(strtoupper($phone));
        $this->assertEquals($userByIdentifier['id'], $createUser['id']);

        $this->assertEquals($userByIdentifier, $user);
    }

    public function testGetUserByIdentifierError()
    {
        $this->expectException(ApiException::class);
        $errorEmail = 'error@passage.id';
        $userByIdentifier = $this->passageClient->getUserByIdentifier($errorEmail);
    }

    public function testDeactivateUser()
    {
        $user = $this->passageClient->deactivateUser($this->userId);

        // Assert that user status is inactive
        $this->assertEquals($user['status'], 'inactive');
        $this->assertEquals($user['id'], $this->userId);
    }


    public function testActivateUser()
    {
        $user = $this->passageClient->activateUser($this->userId);

        // Assert that user status is active
        $this->assertEquals($user['status'], 'active');
        $this->assertEquals($user['id'], $this->userId);
    }

    public function testUpdateUser()
    {
        $userRequest = new UpdateUserRequest(
            array(
            'email' => 'chris+test-update@passage.id'
            )
        );

        $user = $this->passageClient->updateUser($this->userId, $userRequest);

        // Assert that user email has changed
        $this->assertEquals($user['email'], 'chris+test-update@passage.id');
    }

    public function testListUserDevices()
    {
        $devices = $this->passageClient->listUserDevices($this->userId);

        // Assert that devices exist
        $this->assertIsArray($devices);
    }
}
