<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Services\GalleryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends BaseController
{
    protected $galleryService;

    public function __construct(
        GalleryService $galleryService
    ) {
        $this->galleryService = $galleryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $galleries = $this->galleryService->getAllGallerys();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.galleries.index', [
            'galleries' => $galleries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->galleryService->storeGallerys(
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('galleries.index')->with('success', 'Gallery created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $gallery = $this->galleryService->getGallerysById(
                galleryId: $id
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.galleries.edit', ([
            'gallery' => $gallery,
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->galleryService->updateGallerys(
                galleryId: $id,
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('galleries.index')->with('success', 'Gallery updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $slider = $this->galleryService->deleteGallerysData(
                galleryId: $id
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('galleries.index')->with('success', 'Gallery deleted successfully.');
    }

    /**
     * Remove Single Gallery image
     */
    public function deleteMedia(string $id)
    {
        try {
            $slider = $this->galleryService->deleteSingleImage(
                imageId: $id
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
