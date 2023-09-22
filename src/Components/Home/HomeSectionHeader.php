<?php

namespace App\Components\Home;

use App\Repository\CompanyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template:'themes/%env(APP_THEME)%/components/home/HomeSectionHeader.html.twig')]
class HomeSectionHeader
{
    public function __construct(public string $title = "", public string $header = "", public string $description = "")
    { }
}