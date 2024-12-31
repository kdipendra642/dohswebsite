<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

interface MediaRepositoryInterface extends BaseRepositoryInterface
{
    public function upload(object $model, UploadedFile $file, string $collectionName = 'default'): Media;

    public function deleteMedia(object $model, string $collectionName = 'default'): void;

    public function deleteMediaByUuid($mediaUuid): void;
}
