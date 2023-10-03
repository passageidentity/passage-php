<?php

use PHPUnit\Framework\TestCase;
// use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp\Psr7\Request;
use Lcobucci\Clock\FrozenClock;
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

    public function testAuthenticateRequestWithCookie()
    {
        // $this->authentication
        // $this->expectException(\ArgumentCountError::class);
        // $this->expectExceptionMessage('Too few arguments to function Passage\Client\Controllers\Passage::__construct()');


        


        // $clock = new FrozenClock(new DateTimeImmutable('2022-06-24 22:51:10'));
        // $key   = InMemory::base64Encoded(
        //     'hiG8DlOKvtih6AxlZn5XKImZ06yu8I3mkOzaJrEuW8yAv8Jnkw330uMt8AEqQ5LB'
        // );

        // $token = (new JwtFacade(null, $clock))->issue(
        //     new Sha256(),
        //     $key,
        //     static fn (
        //         Builder $builder,
        //         DateTimeImmutable $issuedAt
        //     ): Builder => $builder
        // );


        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2OTYzNjYzMzMsIm5iZiI6MTY5NjM2NjMzMywiZXhwIjoxNjk2NDUyNzMzLCJpc3MiOiJodHRwczovL2F1dGgucGFzc2FnZS5pZC92MS9hcHBzL1RyV1NVYkREVFBDS1RRRHRMQTlNTzhFZS8ud2VsbC1rbm93bi9qd2tzLmpzb24ifQ.488vxhs-SW-8zHqHK3EW5Tv1sgbHnyrQEWJHXBiVxYE';
        
        $request = new Request(
            'GET',
            '/cookie',
            ['cookie' => 'psg_auth_token=' . $token]
        );

        $passage = new Passage($this->appId, $this->apiKey);
        $authentication = new Authentication($passage);
        $authentication->authenticateRequest($request);
        $this->assertEquals($authentication->authenticateRequest($request), $this->userId);
    }

    // public function testAuthenticateRequestWithCookie()
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