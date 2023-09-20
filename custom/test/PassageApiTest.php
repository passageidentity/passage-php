<?php

use PHPUnit\Framework\TestCase;
use Passage\Client\Api\PassageApi;

class PassageApiTest extends TestCase
{
    public function testConstructorMissingAppId()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('A Passage app_id is required. Please include [app_id => YOUR_APP_ID].');

        new PassageApi(['api_key' => '987654']);
    }

    public function testConstructorMissingApiKey()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('A Passage api_key is required. Please include [api_key => YOUR_API_KEY].');

        new PassageApi(['app_id' => '123456']);
    }

    public function testConstructorWithAppId()
    {
        $config = ['app_id' => '123456', 'api_key' => '987654'];
        $passageApi = new PassageApi($config);

        print_r($passageApi);

        // Assert that the object was created successfully
        $this->assertInstanceOf(PassageApi::class, $passageApi);

        // Assert that app_id and api_key properties are correctly set
        $this->assertEquals('123456', $passageApi->getAppId());
    }
}
