<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\PostRequest;
use App\Services\CategoryService;
use App\Services\PostService;
use Illuminate\Support\Facades\DB;

class PostController extends BaseController
{
    protected $postService;
    protected $categoryService;

    public function __construct(
        PostService $postService,
        CategoryService $categoryService
    ) {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $posts = $this->postService->getAllPosts();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryService->getAllCAtegory();

        return view('backend.posts.create',( [
            'categories' => $categories
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->postService->storePosts(
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $posts = $this->postService->getPostsById(
                postsId: $id
            );
            $categories = $this->categoryService->getAllCAtegory();

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.posts.edit', ([
            'posts' => $posts,
            'categories' => $categories
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->postService->updatePosts(
                postsId: $id,
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('posts.index')->with('success', 'Posts updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $posts = $this->postService->deletePostsData(
                postsId: $id
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
