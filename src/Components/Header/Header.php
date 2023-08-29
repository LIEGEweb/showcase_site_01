<?php

namespace App\Components\Header;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template: 'themes/%env(APP_THEME)%/components/header/Header.html.twig')]
class Header
{
    public function __construct(public ?array $routes = []
    )
    {
    }
}