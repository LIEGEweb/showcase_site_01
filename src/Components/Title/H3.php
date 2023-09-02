<?php

namespace App\Components\Title;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template: 'themes/%env(APP_THEME)%/components/title/H3.html.twig')]
class H3
{
    public function __construct(public ?string $label = "",
                                public ?string $id = ""
    )
    {
    }
}