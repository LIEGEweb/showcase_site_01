<?php

namespace App\Components\Link;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template: 'themes/%env(APP_THEME)%/components/link/Link.html.twig')]
class Link
{
    public function __construct(public ?string $label = "",
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