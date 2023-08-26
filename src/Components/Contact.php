<?php

namespace App\Components;

use App\Entity\Company;
use App\Repository\CompanyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent (template:'themes/%env(APP_THEME)%/components/Contact.html.twig')]
class Contact
{
    public Object $contactInfos;
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->contactInfos = !empty($companyRepository->findAll()) ? $companyRepository->findAll()[0] : new Company();
    }
}