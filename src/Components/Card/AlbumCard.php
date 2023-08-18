<?php

namespace App\Components\Card;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template: 'themes/%env(APP_THEME)%/components/card/Album-card.html.twig')]
class AlbumCard
{
    public function __construct(public ?string $name = "",
                                public ?string $slug = "",
                                public ?string $description = "",
                                public ?string $route = "",
                                public ?string $fileName = "",
                                public ?string $alt = "",
                                public ?string $id = "",
    )
    {}
}