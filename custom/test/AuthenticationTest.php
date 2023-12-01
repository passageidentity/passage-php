<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use Firebase\JWT\JWT;
use Passage\Client\Authentication;
use Passage\Client\Passage;



class AuthenticationTest extends TestCase {
    private $appId;
    private $apiKey;
    private $appToken;
    private $userId;

    public function setUp(): void
    {
        parent::setUp();

        $config = include('config.php');

        $this->appId = $config['APP_ID'];
        $this->apiKey = $config['API_KEY'];
        $this->appToken = $config['EXAMPLE_AUTH_TOKEN'];
        $this->userId = $config['EXAMPLE_USER_ID'];
    }

    public function testValidJWT() {
        $passage = new Passage($this->appId, $this->apiKey);
        $authentication = new Authentication($passage);
        
        $user = $authentication->validateJWT($this->appToken);
        $this->assertEquals($this->userId, $user);
    }

    public function testInvalidJWT() {
        $passage = new Passage($this->appId, $this->apiKey);
        $authentication = new Authentication($passage);
        
        $user = $authentication->validateJWT('incorrect.token');
        $this->assertEquals(null, $user);
    }
}
