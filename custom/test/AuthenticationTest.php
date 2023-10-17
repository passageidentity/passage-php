<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Psr7\Request;
use Firebase\JWT\JWT;

use Passage\Client\Controllers\Authentication;
use Passage\Client\Controllers\Passage;



class AuthenticationTest extends TestCase {
    private $appId;
    private $apiKey;
    private $userId;

    public function setUp(): void
    {
        parent::setUp();

        $config = include('config.php');

        $this->appId = $config['APP_ID'];
        $this->apiKey = $config['API_KEY'];
        $this->userId = $config['EXAMPLE_USER_ID'];
    }

    public function testValidAuthTokenWithValidToken() {
        $passage = new Passage($this->appId, $this->apiKey);
        $authentication = new Authentication($passage);
        
        $validToken = 'your_valid_jwt_token';
        $jwks = ['kid' => 'your_key_id'];

        $result = $authentication->validAuthToken($validToken);

        var_dump(JWT::decode($payload, JWK::parseKeySet($jwks)));

        // Assert that the result is the expected user ID
        $this->assertEquals('expected_user_id', $result);
    }

    // public function testAuthenticateRequestWithCookie()
    // {
    //     $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2OTYzNjYzMzMsIm5iZiI6MTY5NjM2NjMzMywiZXhwIjoxNjk2NDUyNzMzLCJpc3MiOiJodHRwczovL2F1dGgucGFzc2FnZS5pZC92MS9hcHBzL1RyV1NVYkREVFBDS1RRRHRMQTlNTzhFZS8ud2VsbC1rbm93bi9qd2tzLmpzb24ifQ.488vxhs-SW-8zHqHK3EW5Tv1sgbHnyrQEWJHXBiVxYE';
        
    //     $request = new Request(
    //         'GET',
    //         '/cookie',
    //         ['cookie' => 'psg_auth_token=' . $token]
    //     );

    //     var_dump($request);

    //     $passage = new Passage($this->appId, $this->apiKey);
    //     $authentication = new Authentication($passage);
    //     $authentication->authenticateRequest($request);
    //     $this->assertEquals(true, true);
    //     // $this->assertEquals($authentication->authenticateRequest($request), $this->userId);
    // }

    // public function testAuthenticateRequestWithHeader()
    // {
    //     // $this->authentication
    //     // $this->expectException(\ArgumentCountError::class);
    //     // $this->expectExceptionMessage('Too few arguments to function Passage\Client\Controllers\Passage::__construct()');

    //     $passage = new Passage($this->appId, $this->apiKey);
    //     $request = new Request(
    //         'GET',
    //         '/cookie',
    //         ['cookie' => 'psg_auth_token=' . $this->appId]
    //     );
        
    //     $authentication = new Authentication($passage);
    //     $authentication->authenticateRequest($request);

    //     $this->assertEquals($authentication->authenticateRequest($request), 'user4865');
    // }
}


// test('authenticateRequestWithCookie', async () => {
//     await request(app).get('/cookie').expect(401); // no token set --> 401
//     await request(app)
//         .get('/cookie')
//         .set('Cookie', [`psg_auth_token=invalid_token`]) // invalid token set --> 401
//         .expect(401);
//     await request(app)
//         .get('/cookie')
//         .set('Cookie', [`psg_auth_token=${appToken}`])
//         .expect(200);
// });

// test('authenticateRequestWithHeader', async () => {
//     await request(app).get('/header').expect(401); // no token set --> 401
//     await request(app).get('/header').set('Authorization', `Bearer invalid_token`).expect(401);
//     await request(app).get('/header').set('Authorization', `Bearer ${appToken}`).expect(200);
// });

// test('validAuthToken', async () => {
//     const userIdFromToken = await passage.validAuthToken(appToken);
//     expect(userIdFromToken).toBe(userID);
// });

// test('invalidAuthToken', () => {
//     expect(async () => await passage.validAuthToken('invalid_token')).rejects.toThrow(PassageError);
// });