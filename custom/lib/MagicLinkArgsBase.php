<?php

namespace Passage\Client;

readonly class MagicLinkArgsBase
{
    public function __construct(
        public readonly string $type,
        public readonly bool $send,
    ) {
    }
}
