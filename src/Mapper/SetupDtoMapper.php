<?php

namespace App\Mapper;

use App\Dto\SetupDto;
use App\Entity\SectionHeader;
use App\Entity\Setup;

class SetupDtoMapper
{

    public static function toDto(Setup $setup): SetupDto
    {
        return new SetupDto(
            $setup->getHomeHeadline(),
            $setup->getHomeSubHeadline(),
            $setup->getHomeCtaButton(),
            $setup->getHomeCtaAction(),
            $setup->getHomeSecondaryButton(),
            $setup->getHomeSecondaryAction(),
            $setup->getHomeCtaImage(),
            $setup->getHomeCtaImageAlt(),
            $setup->getServiceTitle(),
            $setup->getServiceHeader(),
            $setup->getServiceDescription(),
            $setup->getAlbumHeader(),
            $setup->getSocialHeader()
        );
    }
}