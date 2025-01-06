<?php

namespace App\Enums;

enum PostSubCategoryTypeEnum: string
{
    case LAWS_REGULATION = "laws-regulation";
    case INFORMATION_NEWS = "information-news";
    case TENDER_NOTICE = "tender-notice";
    case PUBLICATION = "publication";
    case OTHER = "other";

    public static function getAllValues(): array
    {
        return array_column(self::cases(), "value");
    }
}