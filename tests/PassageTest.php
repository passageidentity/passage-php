<?php

namespace Passage\Test;

use PHPUnit\Framework\TestCase;
use OpenAPI\Client\HeaderSelector;

class PassageTest extends TestCase
{
    public function testPassageVersionHeader()
    {
        $headerSelector = new HeaderSelector();
        $headers = $headerSelector->selectHeaders(['application/json'], 'application/json', false);

        $this->assertMatchesRegularExpression('/^passage-php \d+\.\d+\.\d+$/', $headers['Passage-Version']);
    }
}
