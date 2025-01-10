<?php

namespace Passage\Client;

use OpenAPI\Client\Model\MagicLinkType;

final readonly class MagicLinkWithPhoneArgs extends MagicLinkArgsBase
{
    /**
     * @param string $phone The phone number to send the magic link to
     * @param \OpenAPI\Client\Model\MagicLinkType $type The type of magic link to send
     * @param bool $send Whether to send the magic link
     * @see OpenAPI\Client\Model\MagicLinkType
     */
    public function __construct(
        public string $phone,
        MagicLinkType $type,
        bool $send,
    ) {
        parent::__construct($type, $send);
    }
}
