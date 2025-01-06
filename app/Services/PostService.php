<?php

namespace App\Services;

use App\Repositories\Interfaces\PostRepositoryInterface;

class PostService
{
    protected $postRepository;

    public function __construct(
        PostRepositoryInterface $postRepository,
    ) {
        $this->postRepository = $postRepository;
    }

    /**
     * List All Slider
     */
    public function getAllPosts(): object
    {
        return $this->postRepository->fetchAll(
            with: [
                'category',
                'media',
            ],
            order: [
                'created_at' => 'desc'
            ]
        );
    }

    /**
     * Store Slider
     */
    public function storePosts(array $data): void
    {
        $posts = $this->postRepository->store($data);

        if (isset($data['document'])) {
            $posts->addMedia($data['document'])->toMediaCollection('posts');
        }
    }

    /**
     * Get By Id
     */
    public function getPostsById(string|int $postsId): object
    {
        return $this->postRepository->fetch(
            id: $postsId,
            with: [
                'category',
                'media',
            ]
        );
    }

    /**
     * Update Slider
     */
    public function updatePosts(string|int $postsId, array $data): object
    {
        $slider = $this->postRepository->update(
            data: $data,
            id: $postsId
        );

        if (isset($data['document'])) {
            $slider->clearMediaCollection('posts');
            $slider->addMedia($data['document'])->toMediaCollection('posts');
        }

        return $slider;
    }

    /**
     * Delete A Slider
     */
    public function deletePostsData(string|int $postsId): void
    {
        $posts = $this->postRepository->fetch(
            id: $postsId,
            with: [
                'category',
            ]
        );

        if ($posts->image) {
            $posts->clearMediaCollection('posts');
        }

        $this->postRepository->delete(
            id: $postsId
        );
    }
}
