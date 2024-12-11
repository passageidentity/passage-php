<?php

namespace Passage\Client;

final readonly class MagicLinkWithUserArgs extends MagicLinkArgsBase
{
    /**
     * @param string $userId The Passage user ID
     * @param string $channel The channel to send the magic link to, should be OpenAPI\Client\Model\MagicLinkChannel
     * @param string $type The type of magic link to send, should be OpenAPI\Client\Model\MagicLinkType
     * @param bool $send Whether to send the magic link
     * @see OpenAPI\Client\Model\MagicLinkChannel
     * @see OpenAPI\Client\Model\MagicLinkType
     */
    public function __construct(
        public readonly string $userId,
        public readonly string $channel,
        string $type,
        bool $send,
    ) {
        parent::__construct($type, $send);
    }
}
