<?php

namespace App\Services;

use App\Repositories\Interfaces\ContactMessageRepositoryInterface;

class ContactMessageService
{
    protected $contactMessageRepository;

    public function __construct(
        ContactMessageRepositoryInterface $contactMessageRepository,
    ) {
        $this->contactMessageRepository = $contactMessageRepository;
    }

    /**
     * List All Slider
     */
    public function getAllContactMessages(): object
    {
        return $this->contactMessageRepository->fetchAll();
    }

    /**
     * Store Slider
     */
    public function storeContactMessages(array $data): void
    {
        $this->contactMessageRepository->store($data);
    }

    /**
     * Get By Id
     */
    public function getContactMessagesById(string|int $contactMessagesId): object
    {
        return $this->contactMessageRepository->fetch(
            id: $contactMessagesId,
        );
    }

    /**
     * Delete A Slider
     */
    public function deleteContactMessagesData(string|int $contactMessagesId): void
    {
        $this->contactMessageRepository->delete(
            id: $contactMessagesId
        );
    }
}
