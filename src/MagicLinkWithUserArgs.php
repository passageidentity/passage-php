<?php

namespace Passage\Client;

use OpenAPI\Client\Model\MagicLinkChannel;
use OpenAPI\Client\Model\MagicLinkType;

final readonly class MagicLinkWithUserArgs extends MagicLinkArgsBase
{
    /**
     * @param string $userId The Passage user ID
     * @param \OpenAPI\Client\Model\MagicLinkChannel $channel The channel to send the magic link to
     * @param \OpenAPI\Client\Model\MagicLinkType $type The type of magic link to send
     * @param bool $send Whether to send the magic link
     * @see OpenAPI\Client\Model\MagicLinkChannel
     * @see OpenAPI\Client\Model\MagicLinkType
     */
    public function __construct(
        public string $userId,
        public MagicLinkChannel $channel,
        MagicLinkType $type,
        bool $send,
    ) {
        parent::__construct($type, $send);
    }
}
