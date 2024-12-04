<?php

namespace Passage\Client;

final readonly class MagicLinkWithEmailArgs extends MagicLinkArgsBase
{
    public function __construct(
        public readonly string $email,
    ) {
    }
}
