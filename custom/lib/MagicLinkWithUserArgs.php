<?php

namespace Passage\Client;

final readonly class MagicLinkWithUserArgs extends MagicLinkArgsBase
{
    public function __construct(
        public readonly string $userId,
    ) {
    }
}
