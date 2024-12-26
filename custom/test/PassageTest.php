<?php

namespace Passage\Test;

use PHPUnit\Framework\TestCase;
use OpenAPI\Client\HeaderSelector;
use Passage\Client\Passage;

class PassageTest extends TestCase
{
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
}
