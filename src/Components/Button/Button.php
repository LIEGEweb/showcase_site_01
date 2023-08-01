<?php

namespace App\Components\Button;

use App\Repository\CompanyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template:'themes/%env(APP_THEME)%/components/button/Button.html.twig')]
class Button
{
    public function __construct(public string $route = "", public string $label = "")
    { }
}