<?php

namespace Passage\Client;

final readonly class MagicLinkWithPhoneArgs extends MagicLinkArgsBase
{
    public function __construct(
        public readonly string $phone,
    ) {
    }
}
