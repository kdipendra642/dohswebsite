<?php

namespace App\Services;

use App\Repositories\Interfaces\PopUpRepositoryInterface;

class PopUpService
{
    protected $popUpRepository;

    public function __construct(
        PopUpRepositoryInterface $popUpRepository,
    ) {
        $this->popUpRepository = $popUpRepository;
    }

    /**
     * List All PopUp
     */
    public function getAllPopups(): object
    {
        return $this->popUpRepository->fetchAll(
            with: [
                'media',
            ],
            order: [
                'created_at' => 'desc'
            ]
        );
    }

    /**
     * Store PopUp
     */
    public function storePopups(array $data): void
    {
        $popups = $this->popUpRepository->store($data);

        if (isset($data['image'])) {
            $popups->addMedia($data['image'])->toMediaCollection('pop-ups');
        }
    }

    /**
     * Get By Id
     */
    public function getPopupsById(string|int $popupsId): object
    {
        return $this->popUpRepository->fetch(
            id: $popupsId,
            with: [
                'media',
            ]
        );
    }

    /**
     * Update PopUp
     */
    public function updatePopups(string|int $popupsId, array $data): object
    {
        if(!isset($data['status'])) {
            $data = array_merge($data, [
                'status' => false
            ]);
        }
        $popups = $this->popUpRepository->update(
            data: $data,
            id: $popupsId
        );

        if (isset($data['image'])) {
            $popups->clearMediaCollection('pop-ups');
            $popups->addMedia($data['image'])->toMediaCollection('pop-ups');
        }

        return $popups;
    }

    /**
     * Delete A PopUp
     */
    public function deletePopupsData(string|int $popupsId): void
    {
        $popups = $this->popUpRepository->fetch(
            id: $popupsId,
            with: [
                'media',
            ]
        );

        if ($popups->image) {
            $popups->clearMediaCollection('pop-ups');
        }

        $this->popUpRepository->delete(
            id: $popupsId
        );
    }
}
