<?php

namespace Passage\Client;

final readonly class MagicLinkOptions
{
    public function __construct(
        public readonly string|null $language,
        public readonly string|null $magicLinkPath,
        public readonly string|null $redirectUrl,
        public readonly int|null $ttl,
    ) {
    }
}
