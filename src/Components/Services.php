<?php

namespace App\Components;

use App\Entity\CategoryGroup;
use App\Repository\CategoryGroupRepository;
use App\Repository\CompanyRepository;
use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template:'themes/%env(APP_THEME)%/components/Services.html.twig')]
class Services
{
    public array $categories;
    public function __construct(CategoryGroupRepository $categoryGroupRepository)
    {
        $this->categories = $categoryGroupRepository->findAllWithServices();
    }
}