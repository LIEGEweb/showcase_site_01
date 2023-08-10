<?php

namespace App\Components\Card;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template: 'themes/%env(APP_THEME)%/components/card/Card.html.twig')]
class Card
{
    public function __construct(public ?string $label = "",
                                public ?string $categoryName = "",
                                public ?string $description = "",
                                public ?string $folder = "",
                                public ?string $image = "",
                                public ?bool   $capitalize = false,
                                public ?bool   $uppercase = false,
                                public ?bool   $underline = true,
                                public ?string $route = "",
                                public ?string $fragment = "",
                                public ?string $hrefLink = "",
                                public ?string $id = "",
    )
    {
    }
}