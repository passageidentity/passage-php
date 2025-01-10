<?php

namespace Passage\Client;

use OpenAPI\Client\Model\MagicLinkType;

readonly class MagicLinkArgsBase
{
    public function __construct(
        public MagicLinkType $type,
        public bool $send,
    ) {
    }
}
