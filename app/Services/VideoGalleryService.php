<?php

namespace App\Services;

use App\Repositories\Interfaces\VideoGalleryRepositoryInterface;

class VideoGalleryService
{
    protected $videoGalleryRepository;

    public function __construct(
        VideoGalleryRepositoryInterface $videoGalleryRepository,
    ) {
        $this->videoGalleryRepository = $videoGalleryRepository;
    }

    /**
     * List All Staff
     */
    public function getAllVideoGallery(): object
    {
        return $this->videoGalleryRepository->fetchAll();
    }

    /**
     * Store Staff
     */
    public function storeVideoGallery(array $data): void
    {
        $this->videoGalleryRepository->store($data);
    }

    /**
     * Get By Id
     */
    public function getVideoGalleryById(string|int $videoGalleryId): object
    {
        return $this->videoGalleryRepository->fetch(
            id: $videoGalleryId,
        );
    }

    /**
     * Update Staff
     */
    public function updateVideoGallery(string|int $videoGalleryId, array $data): object
    {
        return $this->videoGalleryRepository->update(
            data: $data,
            id: $videoGalleryId
        );
    }

    /**
     * Delete A Staff
     */
    public function deleteVideoGalleryData(string|int $videoGalleryId): void
    {
        $this->videoGalleryRepository->delete(
            id: $videoGalleryId
        );
    }
}
