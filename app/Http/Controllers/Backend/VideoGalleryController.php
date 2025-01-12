<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\VideoGalleryRequest;
use App\Services\VideoGalleryService;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class VideoGalleryController extends BaseController
{
    protected $videoGalleryService;

    public function __construct(
        VideoGalleryService $videoGalleryService
    ) {
        $this->videoGalleryService = $videoGalleryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $videoGalleries = $this->videoGalleryService->getAllVideoGallery();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.videogalleries.index', [
            'videoGalleries' => $videoGalleries,
        ]);
    }

    /**
     * Get a list of data
     */
    public function galleriesData()
    {
        try {
            $videoGalleries = $this->videoGalleryService->getAllVideoGallery();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return DataTables::of($videoGalleries)
            ->editColumn('created_at', function ($videoGallery) {
                return $videoGallery->created_at->diffForHumans();
            })
            ->editColumn('action', function ($videoGallery) {
                return '
                        <a href="'.route('galleries.edit', $videoGallery->id).'" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter'.$videoGallery->id.'"><i class="fa fa-trash-o"></i></a>
                    ';
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.videogalleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoGalleryRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->videoGalleryService->storeVideoGallery(
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('galleries.index')->with('success', __('messages.create_success', ['name' => 'Video Gallery']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $videoGalleries = $this->videoGalleryService->getVideoGalleryById(
                videoGalleryId: $id
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.videogalleries.edit', ([
            'videoGalleries' => $videoGalleries,
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideoGalleryRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->videoGalleryService->updateVideoGallery(
                videoGalleryId: $id,
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('galleries.index')->with('success', __('messages.update_success', ['name' => 'Video Gallery']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $videoGalleries = $this->videoGalleryService->deleteVideoGalleryData(
                videoGalleryId: $id
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('galleries.index')->with('success', __('messages.delete_success', ['name' => 'Video Gallery']));
    }
}
