<?php

namespace App\Components\Title;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template: 'themes/%env(APP_THEME)%/components/title/H2.html.twig')]
class H2
{
    public function __construct(public ?string $label = "",
                                public ?bool   $capitalize = false,
                                public ?bool   $uppercase = false,
                                public ?string $id = ""
    )
    {
    }
}