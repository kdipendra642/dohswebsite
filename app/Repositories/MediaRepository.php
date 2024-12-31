<?php

namespace App\Repositories;

use App\Repositories\Interfaces\MediaRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaRepository extends BaseRepository implements MediaRepositoryInterface
{
    public $model;

    public function __construct(
        protected Media $media
    ) {
        $this->model = $media;
        parent::__construct();
    }

    public function upload(object $model, UploadedFile $file, string $collectionName = 'default'): Media
    {
        return $model->addMedia($file)->toMediaCollection($collectionName);
    }

    public function deleteMedia(object $model, string $collectionName = 'default'): void
    {
        if ($model->hasMedia($collectionName)) {
            $media = $model->getFirstMedia($collectionName);
            $media->delete();
        }
    }

    public function deleteMediaByUuid($mediaUuid): void
    {
        $rows = $this->model::query();
        $media = $rows->where('uuid', $mediaUuid)->first();

        File::isDirectory($this->getMediaDirectory($media->id));
        $media->delete();
        File::isDirectory($this->getMediaDirectory($media->id));
    }

    // Helper method to get the media directory
    protected function getMediaDirectory($mediaId)
    {
        return public_path("media/{$mediaId}");
    }
}
