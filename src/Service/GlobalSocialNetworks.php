<?php

namespace App\Service;

use App\Repository\SocialNetworkRepository;

class GlobalSocialNetworks
{
    public function __construct(protected SocialNetworkRepository $socialNetworkRepository)
    {}
    public function get(): array
    {
        return $this->socialNetworkRepository->findAll();
    }
}