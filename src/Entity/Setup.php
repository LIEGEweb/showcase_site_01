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

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $homeSecondaryButton = "secondary";

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $homeCtaImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $homeCtaImageAlt = null;

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
}
