<?php

namespace Passage\Client;

use OpenAPI\Client\Model\MagicLinkLanguage;

final readonly class MagicLinkOptions
{
    public function __construct(
        public MagicLinkLanguage|null $language,
        public string|null $magicLinkPath,
        public string|null $redirectUrl,
        public int|null $ttl,
    ) {
    }
}
