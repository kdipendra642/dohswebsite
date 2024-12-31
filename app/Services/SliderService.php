<?php

namespace App\Services;

use App\Repositories\Interfaces\SliderRepositoryInterface;

class SliderService
{
    protected $sliderRepository;

    public function __construct(
        SliderRepositoryInterface $sliderRepository,
    ) {
        $this->sliderRepository = $sliderRepository;
    }

    /**
     * List All Slider
     */
    public function getAllSliders(): object
    {
        return $this->sliderRepository->fetchAll(
            with: [
                'media',
            ]
        );
    }

    /**
     * Store Slider
     */
    public function storeSliders(array $data): void
    {
        $slider = $this->sliderRepository->store($data);
        // $this->mediaRepository->upload(
        //     model: $slider,
        //     file: $data['image'],
        //     collectionName: 'slider-image'
        // );

        if (isset($data['image'])) {
            $slider->addMedia($data['image'])->toMediaCollection('sliders');
        }
    }

    /**
     * Get By Id
     */
    public function getSlidersById(string|int $slidersId): object
    {
        return $this->sliderRepository->fetch(
            id: $slidersId,
            with: [
                'media',
            ]
        );
    }

    /**
     * Update Slider
     */
    public function updateSliders(string|int $slidersId, array $data): object
    {
        $slider = $this->sliderRepository->update(
            data: $data,
            id: $slidersId
        );

        if (isset($data['image'])) {
            $slider->clearMediaCollection('sliders');
            $slider->addMedia($data['image'])->toMediaCollection('sliders');
        }

        return $slider;
    }

    /**
     * Delete A Slider
     */
    public function deleteSlidersData(string|int $slidersId): void
    {
        $slider = $this->sliderRepository->fetch(
            id: $slidersId,
            with: [
                'media',
            ]
        );

        if ($slider->image) {
            $slider->clearMediaCollection('sliders');
        }

        $this->sliderRepository->delete(
            id: $slidersId
        );
    }
}
