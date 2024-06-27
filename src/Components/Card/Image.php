<?php

namespace App\Components\Card;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template: 'components/card/Image-home-card.html.twig')]
class Image
{
    public function __construct(public ?string $album_name = "",
                                public ?string $slug = null,
                                public ?string $fileName = "",
                                public ?string $alt = "",
    )
    {}
    /*public function __construct(public ?string $album_name = "",
                                public ?string $album_slug = "",
                                public ?string $route = "",
                                public ?string $fileName = "",
                                public ?string $alt = "",
                                public ?string $id = "",
                                public ?int $loop_index = null,
    )
    {}*/
}