<?php

namespace Passage\Client;

use OpenAPI\Client\Model\MagicLinkChannel;

final readonly class MagicLinkWithUserArgs extends MagicLinkArgsBase
{
    public function __construct(
        public readonly string $userId,
        public readonly MagicLinkChannel $channel,
    ) {
    }
}
