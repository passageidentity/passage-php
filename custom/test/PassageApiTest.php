<?php

use PHPUnit\Framework\TestCase;
use Passage\Client\Api\PassageApi;

class PassageApiTest extends TestCase
{
    public function testConstructorMissingParam()
    {
        $this->expectException(\ArgumentCountError::class);
        $this->expectExceptionMessage('Too few arguments to function Passage\Client\Api\PassageApi::__construct()');

        new PassageApi('123456');
    }

    public function testConstructorWithAppId()
    {
        $passageApi = new PassageApi('123456', '987654');

        // Assert that the object was created successfully
        $this->assertInstanceOf(PassageApi::class, $passageApi);

        // Assert that app_id and api_key properties are correctly set
        $this->assertEquals('123456', $passageApi->getAppId());
    }
}
