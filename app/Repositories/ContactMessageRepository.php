<?php

namespace App\Repositories;

use App\Models\ContactMessage;
use App\Repositories\Interfaces\ContactMessageRepositoryInterface;

class ContactMessageRepository extends BaseRepository implements ContactMessageRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(ContactMessage::class);
    }
}
