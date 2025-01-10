<?php

namespace Passage\Client;

final readonly class MagicLinkOptions
{
    public function __construct(
        public string|null $language,
        public string|null $magicLinkPath,
        public string|null $redirectUrl,
        public int|null $ttl,
    ) {
    }
}
