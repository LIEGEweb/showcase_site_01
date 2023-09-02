<?php

namespace App\Components\Title;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template: 'themes/%env(APP_THEME)%/components/title/H4.html.twig')]
class H4
{
    public function __construct(public ?string $label = "",
                                public ?string $id = ""
    )
    {
    }
}