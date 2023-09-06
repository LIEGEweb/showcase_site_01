<?php

namespace App\Components\Card;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template: 'themes/%env(APP_THEME)%/components/card/Image-home-card.html.twig')]
class ImageHomeCard
{
    public function __construct(public ?string $album_name = "",
                                public ?string $album_slug = "",
                                public ?string $route = "",
                                public ?string $fileName = "",
                                public ?string $alt = "",
                                public ?string $id = "",
                                public ?int $loop_index = null,
    )
    {}
}