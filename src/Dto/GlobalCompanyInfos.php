<?php

namespace App\Dto;

use App\Entity\Company;
use App\Repository\CompanyRepository;

class GlobalCompanyInfos
{
    private $infos;
    private $repository;

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    private function initializeInfos(): void
    {
        if ($this->infos === null) {
            $companies = $this->repository->findAll();
            $this->infos = !empty($companies) ? $companies[0] : new Company();
        }
    }

    public function getName(): ?string
    {
        $this->initializeInfos();
        return $this->infos->getName();
    }

    public function getVat(): ?string
    {
        $this->initializeInfos();
        return $this->infos->getVat();
    }

    public function getPhone(): ?string
    {
        $this->initializeInfos();
        return $this->infos->getPhone();
    }

    public function getEmail(): ?string
    {
        $this->initializeInfos();
        return $this->infos->getEmail();
    }

    public function getStreetName(): ?string
    {
        $this->initializeInfos();
        return $this->infos->getStreetName();
    }

    public function getStreetNr(): ?string
    {
        $this->initializeInfos();
        return $this->infos->getStreetNr();
    }

    public function getPostalCode(): ?string
    {
        $this->initializeInfos();
        return $this->infos->getPostalCode();
    }

    public function getPostalCity(): ?string
    {
        $this->initializeInfos();
        return $this->infos->getPostalCity();
    }
}
