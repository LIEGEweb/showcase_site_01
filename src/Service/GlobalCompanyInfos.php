<?php

namespace App\Service;

use App\Repository\CompanyRepository;

class GlobalCompanyInfos
{
    private $infos;

//    public function __invoke()
//    {
//        return $this->infos;
//    }

    public function __construct(CompanyRepository $repository)
    {
        $this->infos =  $repository->findAll()[0];
    }

    public function getName(): ?string
    {
        return $this->infos->getName();
    }

    public function getVat(): ?string
    {
        return $this->infos->getVat();
    }


    public function getPhone(): ?string
    {
        return $this->infos->getPhone();
    }

    public function getEmail(): ?string
    {
        return $this->infos->getEmail();
    }

    public function getStreetName(): ?string
    {
        return $this->infos->getStreetName();
    }

    public function getStreetNr(): ?string
    {
        return $this->infos->getStreetNr();
    }

    public function getPostalCode(): ?string
    {
        return $this->infos->getPostalCity();
    }

    public function getPostalCity(): ?string
    {
        return $this->infos->getPostalCity();
    }

}