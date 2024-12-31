<?php

namespace App\Services;

use App\Repositories\Interfaces\SiteSettingRepositoryInterface;

class SiteSettingService
{
    protected $siteSettingRepository;

    public function __construct(
        SiteSettingRepositoryInterface $siteSettingRepository,
    ) {
        $this->siteSettingRepository = $siteSettingRepository;
    }

    /**
     * List All SiteSetting
     */
    public function getAllSiteSettings(): object
    {
        return $this->siteSettingRepository->fetchAll(
            filterable: [
                ['id', '=', 1],
            ]
        );
    }

    /**
     * Store SiteSetting
     */
    public function storeSiteSettings(array $data): void
    {
        // $siteSetting = $this->siteSettingRepository->store($data);
        $this->siteSettingRepository->updateOrStore(
            match: [
                'id' => '1',
            ],
            data: $data
        );
    }

    /**
     * Get By Id
     */
    public function getSiteSettingsById(string|int $siteSettingsId): object
    {
        return $this->siteSettingRepository->fetch(
            id: $siteSettingsId,
        );
    }

    /**
     * Update SiteSetting
     */
    public function updateSiteSettings(string|int $siteSettingsId, array $data): object
    {
        return $this->siteSettingRepository->update(
            data: $data,
            id: $siteSettingsId
        );
    }

    /**
     * Delete A SiteSetting
     */
    public function deleteSiteSettingsData(string|int $siteSettingsId): void
    {
        $this->siteSettingRepository->delete(
            id: $siteSettingsId
        );
    }
}
