<?php

namespace App\Components\News;

use App\Repository\CompanyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template:'themes/%env(APP_THEME)%/components/news/News.html.twig')]
class News
{
    public function __construct(public ?Object $news = null)
    {}
}