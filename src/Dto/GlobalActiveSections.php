<?php

namespace App\Dto;

use App\Entity\Company;
use App\Repository\CompanyRepository;
use App\Repository\SectionManagerRepository;

class GlobalActiveSections
{

    private array $sections = [];

    public function __construct(private SectionManagerRepository $manager)
    {
    }

    private function initializeInfos(string $field): bool
    {
        if (in_array($field, $this->sections))
            return $this->sections[$field];

        if ($section = $this->manager->findOneBy(['name' => $field])) {
            $this->sections[$field] = $section->isActive();
            return $section->isActive();
        }

        return false;
    }

    public function hero()
    {

        return $this->initializeInfos('hero');
//        if (in_array('hero', $this->sections))
//            return $this->sections['hero'];
//
//        if ($section = $this->manager->findOneBy(['name' => 'hero'])) {
//            $this->sections['hero'] = $section->isActive();
//            return $section->isActive();
//        }
//
//        return null;
    }

    public function service()
    {
        return $this->initializeInfos('service');
    }
    public function photo()
    {
        return $this->initializeInfos('photo');
    }
    public function photoLanding()
    {
        return $this->initializeInfos('photo_landing');
    }

}
