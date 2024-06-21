<?php

namespace App\Components\Card;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template: 'components/card/Service.html.twig')]
class Service
{
    public function __construct(public ?string $label = "",
                                public ?string $subtitle = "",
//                                public ?string $slug = "",
                                public ?string $content = "",
//                                public ?string $route = "",
                                public ?string $image = "",
                                public ?string $alt = "",
                                public ?string $id = "",
    )
    {
    }
}