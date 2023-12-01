<?php

use PHPUnit\Framework\TestCase;
use Passage\Client\Passage;

class PassageTest extends TestCase
{
    public function testConstructorMissingParam()
    {
        $this->expectException(\ArgumentCountError::class);
        $this->expectExceptionMessage('Too few arguments to function Passage\Client\Passage::__construct()');

        new Passage('123456');
    }

    public function testConstructorWithAppId()
    {
        $passage = new Passage('123456', '987654');

        // Assert that the object was created successfully
        $this->assertInstanceOf(Passage::class, $passage);

        // Assert that app_id and api_key properties are correctly set
        $this->assertEquals('123456', $passage->getAppId());
    }
}
