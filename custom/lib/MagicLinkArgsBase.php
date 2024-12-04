<?php

namespace Passage\Client;

use OpenAPI\Client\Model\MagicLinkType;

readonly class MagicLinkArgsBase
{
    public function __construct(
        public readonly MagicLinkType $type,
        public readonly bool $send,
    ) {
    }
}
