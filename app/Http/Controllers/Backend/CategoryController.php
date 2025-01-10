<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CategoryController extends BaseController
{
    protected $categoryService;

    public function __construct(
        CategoryService $categoryService
    ) {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = $this->categoryService->getAllCAtegory();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Get a list of data
     */
    public function categoriesData()
    {
        try {
            $categories = $this->categoryService->getAllCAtegory();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return DataTables::of($categories)
            ->editColumn('created_at', function ($category) {
                return $category->created_at->diffForHumans();
            })
            ->editColumn('action', function ($category) {
                return '
                        <a href="'.route('categories.edit', $category->id).'" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter'.$category->id.'"><i class="fa fa-trash-o"></i></a>
                    ';
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->categoryService->storeCAtegory(
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('categories.index')->with('success', __('messages.create_success', ['name' => 'Category']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $categories = $this->categoryService->getCAtegoryById(
                categoryId: $id
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.categories.edit', ([
            'categories' => $categories,
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->categoryService->updateCAtegory(
                categoryId: $id,
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('categories.index')->with('success', __('messages.update_success', ['name' => 'Category']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $categories = $this->categoryService->deleteCAtegoryData(
                categoryId: $id
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('categories.index')->with('success', __('messages.delete_success', ['name' => 'Category']));
    }
}
