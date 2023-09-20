
<?php

namespace Passage\Client\Api;

use Lcobucci\JWT\Encoding\ChainedFormatter;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Token\Builder;

require '../../../vendor/autoload.php';

class AuthenticationApi {
    private $passage;
    private $jwks;
    public $authStrategy;

    /**
     * Initialize a new Passage instance.
     * @param PassageApi $passage
     * 
     * @throws \InvalidArgumentException
     */
    public function __construct(PassageApi $passage) {
        $this->passage = $passage;
        $this->authStrategy = $config['authStrategy'];

        $appId = $this->passageApi->getAppId();
        $url = "https://auth.passage.id/v1/apps/$appID/.well-known/jwks.json";

        $now = new DateTimeImmutable();
        $tokenBuilder = (new Builder(new JoseEncoder(), ChainedFormatter::default()));

        $this->jwks = $tokenBuilder
            ->permittedFor($url)
            ->expiresAt($now->modify('+24 hour'));
    }
}

?>