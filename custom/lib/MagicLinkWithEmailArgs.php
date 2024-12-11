<?php

namespace Passage\Client;

final readonly class MagicLinkWithEmailArgs extends MagicLinkArgsBase
{
    /**
     * @param string $email The email to send the magic link to
     * @param string $type The type of magic link to send, should be OpenAPI\Client\Model\MagicLinkType
     * @param bool $send Whether to send the magic link
     * @see OpenAPI\Client\Model\MagicLinkType
     */
    public function __construct(
        public readonly string $email,
        string $type,
        bool $send,
    ) {
        parent::__construct($type, $send);
    }
}
