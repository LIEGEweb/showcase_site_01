<?php

namespace App\Components\Card;

use App\Repository\SocialNetworkRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template: 'themes/%env(APP_THEME)%/components/card/Social-home-card.html.twig')]
class SocialHomeCard
{
    public function __construct(public ?string $name = "",
                                public ?string $url = "")
    {}

}