<?php

namespace App\Components\Link;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template: 'themes/%env(APP_THEME)%/components/link/Link.html.twig')]
class Link
{
    public function __construct(public ?string $label = "",
                                public ?string $route = "",
                                public ?string $fragment = "",
                                public ?string  $slug = "",
                                public ?string $hrefLink = "",
                                public ?string $id = "",
    )
    {
    }
}