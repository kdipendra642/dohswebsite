<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\PostRequest;
use App\Services\CategoryService;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

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
            $categories = $this->categoryService->getAllCAtegory();
            $posts = $this->postService->getAllPosts();

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.posts.index', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    /**
     * Get List of All Data
     */
    public function postsData(Request $request)
    {
        try {
            $filterable = [];

            if ($request->input('category_id')) {
                $categoryId = $request->input('category_id');
                $filterable = array_merge($filterable, [
                    ['category_id', '=', $categoryId],
                ]);
            }

            if ($request->input('sub_category')) {
                $subcategory = $request->input('sub_category');
                $filterable = array_merge($filterable, [
                    ['sub_category', '=', $subcategory],
                ]);
            }

            $posts = $this->postService->getAllPosts(filterable: $filterable);

            // $posts = $this->postService->getAllPosts(filterable: $filterable);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return DataTables::of($posts)
            ->editColumn('description', function ($post) {
                return Str::limit($post->description, 100); // Assuming category is a relationship
            })
            ->editColumn('document_url', function ($post) {
                if ($post->getMedia('posts')->isNotEmpty()) {
                    $mediaItem = $post->getMedia('posts')->first();

                    return [
                        'media' => $mediaItem->getUrl(),
                        'type' => $mediaItem->mime_type,
                    ];
                }

                return '';
            })
            ->editColumn('category', function ($post) {
                return $post->category->title;
            })
            ->editColumn('created_at', function ($post) {
                return $post->created_at->diffForHumans();
            })
            ->editColumn('action', function ($post) {
                return '
                        <a href="'.route('posts.edit', $post->id).'" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter'.$post->id.'"><i class="fa fa-trash-o"></i></a>
                    ';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryService->getAllCAtegory();

        return view('backend.posts.create', ([
            'categories' => $categories,
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

        return redirect()->route('posts.index')->with('success', __('messages.create_success', ['name' => 'Post']));
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
            'categories' => $categories,
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

        return redirect()->route('posts.index')->with('success', __('messages.update_success', ['name' => 'Post']));
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

        return redirect()->route('posts.index')->with('success', __('messages.delete_success', ['name' => 'Post']));
    }
}
