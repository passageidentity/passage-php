<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use Firebase\JWT\JWT;
use OpenAPI\Client\ApiException;
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

        var_dump('ENVIRONMENT VARIABLESSSS');
        var_dump(getenv('APP_ID'));

        $this->appId = getenv('APP_ID');
        $this->apiKey = getenv('API_KEY');
        $this->appToken = getenv('EXAMPLE_AUTH_TOKEN');
        $this->userId = getenv('EXAMPLE_USER_ID');
    }

    public function testValidJWT() {
        $passage = new Passage($this->appId, $this->apiKey);
        $authentication = new Authentication($passage);
        
        $user = $authentication->validateJWT($this->appToken);


        $this->assertEquals($this->userId, $user);
    }

    // public function testInvalidJWT() {
    //     $passage = new Passage($this->appId, $this->apiKey);
    //     $authentication = new Authentication($passage);
        
    //     $this->expectException(ApiException::class);
    //     $user = $authentication->validateJWT('incorrect.token');
    // }
}
