<?php

namespace App\Services;

use App\Repositories\Interfaces\GalleryRepositoryInterface;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GalleryService
{
    protected $galleryRepository;

    public function __construct(
        GalleryRepositoryInterface $galleryRepository,
    ) {
        $this->galleryRepository = $galleryRepository;
    }

    /**
     * List All Gallery
     */
    public function getAllGallerys(): object
    {
        return $this->galleryRepository->fetchAll(
            with: [
                'thumbnail',
                'supportingImages',
            ],
            order: [
                'created_at' => 'desc'
            ]
        );
    }

    /**
     * Store Gallery
     */
    public function storeGallerys(array $data): void
    {
        $gallery = $this->galleryRepository->store($data);

        if (isset($data['thumbnail'])) {
            $gallery->addMedia($data['thumbnail'])->toMediaCollection('thumbnail');
        }

        if (isset($data['supportingImages'])) {
            foreach ($data['supportingImages'] as $supportingImages) {
                $gallery->addMedia($supportingImages)->toMediaCollection('supporting_images');
            }
        }
    }

    /**
     * Get By Id
     */
    public function getGallerysById(string|int $galleryId): object
    {
        return $this->galleryRepository->fetch(
            id: $galleryId,
            with: [
                'thumbnail',
                'supportingImages',
            ]
        );
    }

    /**
     * Update Gallery
     */
    public function updateGallerys(string|int $galleryId, array $data): object
    {
        if (! isset($data['add_to_slider'])) {
            $data = array_merge($data, [
                'add_to_slider' => false,
            ]);
        }

        $gallery = $this->galleryRepository->update(
            data: $data,
            id: $galleryId
        );

        if (isset($data['thumbnail'])) {
            $gallery->clearMediaCollection('thumbnail');
            $gallery->addMedia($data['thumbnail'])->toMediaCollection('thumbnail');
        }

        if (isset($data['supportingImages'])) {
            foreach ($data['supportingImages'] as $supportingImages) {
                $gallery->addMedia($supportingImages)->toMediaCollection('supporting_images');
            }
        }

        return $gallery;
    }

    /**
     * Delete A Gallery
     */
    public function deleteGallerysData(string|int $galleryId): void
    {
        $gallery = $this->galleryRepository->fetch(
            id: $galleryId,
            with: [
            ]
        );

        if ($gallery->thumbnail) {
            $gallery->clearMediaCollection('thumbnail');
        }

        if ($gallery->supporting_images) {
            $gallery->clearMediaCollection('supporting_images');
        }

        $this->galleryRepository->delete(
            id: $galleryId
        );
    }

    /**
     * Delete single image
     */
    public function deleteSingleImage(string $imageId): void
    {
        Media::destroy($imageId);
    }
}
