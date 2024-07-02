<?php

namespace App\Dto;

use App\Entity\Company;
use App\Repository\CompanyRepository;
use App\Repository\SectionManagerRepository;

class GlobalActiveSections
{
    public function __construct(private SectionManagerRepository $manager, private array $sections = [])
    {
    }

    private function getFieldStatu(string $field): bool
    {
        if (array_key_exists($field, $this->sections)) {
            return $this->sections[$field];
        }

        if ($section = $this->manager->findOneBy(['name' => $field])) {
            $this->sections[$field] = $section->isActive();
            return $section->isActive();
        } else {
            return false;
        }
    }

    public function hero()
    {
        return $this->getFieldStatu('hero');
    }

    public function service()
    {
        return $this->getFieldStatu('service');
    }
    public function photo()
    {
        return $this->getFieldStatu('photo');
    }
    public function photoLanding()
    {
        return $this->getFieldStatu('photo_landing');
    }
    public function social()
    {
        return $this->getFieldStatu('social');
    }
    public function contactLanding()
    {
        return $this->getFieldStatu('contact_landing');
    }
    public function contactPage()
    {
        return $this->getFieldStatu('contact_page');
    }
}
