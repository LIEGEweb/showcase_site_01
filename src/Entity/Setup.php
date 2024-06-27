<?php

namespace App\Entity;

use App\Repository\SetupRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SetupRepository::class)]
class Setup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $homeHeadline = "";

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $homeSubHeadline = "";

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $homeCtaButton = "cta";

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $homeCtaAction = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $homeSecondaryButton = "secondary";

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $homeSecondaryAction = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $homeCtaImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $homeCtaImageAlt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $serviceTitle = "Services";

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $serviceHeader = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $serviceDescription = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?SectionHeader $albumHeader = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?SectionHeader $socialHeader = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHomeHeadline(): ?string
    {
        return $this->homeHeadline;
    }

    public function setHomeHeadline(?string $homeHeadline): static
    {
        $this->homeHeadline = $homeHeadline;

        return $this;
    }

    public function getHomeSubHeadline(): ?string
    {
        return $this->homeSubHeadline;
    }

    public function setHomeSubHeadline(?string $homeSubHeadline): static
    {
        $this->homeSubHeadline = $homeSubHeadline;

        return $this;
    }

    public function getHomeSecondaryButton(): ?string
    {
        return $this->homeSecondaryButton;
    }

    public function setHomeSecondaryButton(?string $homeSecondaryButton): static
    {
        $this->homeSecondaryButton = $homeSecondaryButton;

        return $this;
    }

    public function getHomeCtaImage(): ?string
    {
        return $this->homeCtaImage;
    }

    public function setHomeCtaImage(?string $homeCtaImage): static
    {
        $this->homeCtaImage = $homeCtaImage;

        return $this;
    }

    public function getHomeCtaImageAlt(): ?string
    {
        return $this->homeCtaImageAlt;
    }

    public function setHomeCtaImageAlt(?string $homeCtaImageAlt): static
    {
        $this->homeCtaImageAlt = $homeCtaImageAlt;

        return $this;
    }

    public function getHomeCtaButton(): ?string
    {
        return $this->homeCtaButton;
    }

    public function setHomeCtaButton(?string $homeCtaButton): static
    {
        $this->homeCtaButton = $homeCtaButton;

        return $this;
    }

    public function getHomeCtaAction(): ?string
    {
        return $this->homeCtaAction;
    }

    public function setHomeCtaAction(?string $homeCtaAction): static
    {
        $this->homeCtaAction = $homeCtaAction;

        return $this;
    }

    public function getHomeSecondaryAction(): ?string
    {
        return $this->homeSecondaryAction;
    }

    public function setHomeSecondaryAction(?string $homeSecondaryAction): static
    {
        $this->homeSecondaryAction = $homeSecondaryAction;

        return $this;
    }

    public function getServiceTitle(): ?string
    {
        return $this->serviceTitle;
    }

    public function setServiceTitle(?string $serviceTitle): static
    {
        $this->serviceTitle = $serviceTitle;

        return $this;
    }

    public function getServiceHeader(): ?string
    {
        return $this->serviceHeader;
    }

    public function setServiceHeader(?string $serviceHeader): static
    {
        $this->serviceHeader = $serviceHeader;

        return $this;
    }

    public function getServiceDescription(): ?string
    {
        return $this->serviceDescription;
    }

    public function setServiceDescription(?string $serviceDescription): static
    {
        $this->serviceDescription = $serviceDescription;

        return $this;
    }

    public function getAlbumHeader(): ?SectionHeader
    {
        return $this->albumHeader;
    }

    public function setAlbumHeader(?SectionHeader $albumHeader): static
    {
        $this->albumHeader = $albumHeader;

        return $this;
    }

    public function getSocialHeader(): ?SectionHeader
    {
        return $this->socialHeader;
    }

    public function setSocialHeader(?SectionHeader $socialHeader): static
    {
        $this->socialHeader = $socialHeader;

        return $this;
    }


}
