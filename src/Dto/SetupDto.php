<?php

namespace App\Dto;

use App\Entity\SectionHeader;

class SetupDto
{
    public function __construct(private readonly ?string        $homeHeadline,
                                private readonly ?string        $homeSubHeadline,
                                private readonly ?string        $homeCtaButton,
                                private readonly ?string        $homeCtaAction,
                                private readonly ?string        $homeSecondaryButton,
                                private readonly ?string        $homeSecondaryAction,
                                private readonly ?string        $homeCtaImage,
                                private readonly ?string        $homeCtaImageAlt,
                                private readonly ?string        $serviceTitle,
                                private readonly ?string        $serviceHeader,
                                private readonly ?string        $serviceDescription,
                                private readonly ?SectionHeader $albumHeader,
                                private readonly ?SectionHeader $socialHeader)
    {
    }


    public function getHomeHeadline(): ?string
    {
        return $this->homeHeadline;
    }

    public function getHomeSubHeadline(): ?string
    {
        return $this->homeSubHeadline;
    }

    public function getHomeCtaButton(): ?string
    {
        return $this->homeCtaButton;
    }

    public function getHomeCtaAction(): ?string
    {
        return $this->homeCtaAction;
    }

    public function getHomeSecondaryButton(): ?string
    {
        return $this->homeSecondaryButton;
    }

    public function getHomeSecondaryAction(): ?string
    {
        return $this->homeSecondaryAction;
    }

    public function getHomeCtaImage(): ?string
    {
        return $this->homeCtaImage;
    }

    public function getHomeCtaImageAlt(): ?string
    {
        return $this->homeCtaImageAlt;
    }

    public function getServiceTitle(): ?string
    {
        return $this->serviceTitle;
    }

    public function getServiceHeader(): ?string
    {
        return $this->serviceHeader;
    }

    public function getServiceDescription(): ?string
    {
        return $this->serviceDescription;
    }

    public function getAlbumHeader(): ?SectionHeader
    {
        return $this->albumHeader;
    }

    public function getSocialHeader(): ?SectionHeader
    {
        return $this->socialHeader;
    }

}