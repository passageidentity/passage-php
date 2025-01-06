<?php

namespace Passage\Client;

use OpenAPI\Client\Model\MagicLinkType;

final readonly class MagicLinkWithEmailArgs extends MagicLinkArgsBase
{
    /**
     * @param string $email The email to send the magic link to
     * @param \OpenAPI\Client\Model\MagicLinkType $type The type of magic link to send
     * @param bool $send Whether to send the magic link
     * @see OpenAPI\Client\Model\MagicLinkType
     */
    public function __construct(
        public string $email,
        MagicLinkType $type,
        bool $send,
    ) {
        parent::__construct($type, $send);
    }
}
