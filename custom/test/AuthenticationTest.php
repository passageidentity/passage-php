<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use Firebase\JWT\JWT;
use Passage\Client\Controllers\Authentication;
use Passage\Client\Controllers\Passage;



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

    public function testValidAuthTokenInHeader() {
        $passage = new Passage($this->appId, $this->apiKey, 'HEADER');
        $authentication = new Authentication($passage);

        $headers = [
            'Authorization' => 'Bearer ' . $this->appToken
        ];

        $request = new Request('GET', '/endpoint', $headers);
        
        $user = $authentication->authenticateRequest($request);
        $this->assertEquals($this->userId, $user);
    }

    public function testValidAuthTokenInCookie() {
        $passage = new Passage($this->appId, $this->apiKey);
        $authentication = new Authentication($passage);
        
        $cookies = [
            'cookies' => 'psg_auth_token=' . $this->appToken
        ];

        $request = new Request('GET', '/endpoint', $cookies);
        
        $user = $authentication->authenticateRequest($request);

        $this->assertEquals($this->userId, $user);
    }
}
