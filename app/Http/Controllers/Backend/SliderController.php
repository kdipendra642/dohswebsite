<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\SliderRequest;
use App\Services\SliderService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SliderController extends BaseController
{
    protected $sliderService;

    public function __construct(
        SliderService $sliderService
    ) {
        $this->sliderService = $sliderService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $sliders = $this->sliderService->getAllSliders();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.sliders.index', [
            'sliders' => $sliders,
        ]);
    }

    /**
     * Get Sliders data
     */
    public function slidersData()
    {
        try {
            $sliders = $this->sliderService->getAllSliders();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return DataTables::of($sliders)
            ->editColumn('description', function ($slider) {
                return Str::limit($slider->description, 100);
            })
            ->editColumn('document_url', function ($slider) {
                if ($slider->getMedia('sliders')->isNotEmpty()) {
                    $mediaItem = $slider->getMedia('sliders')->first();

                    return [
                        'media' => $mediaItem->getUrl(),
                        'type' => $mediaItem->mime_type,
                    ];
                }

                return '';
            })
            ->editColumn('created_at', function ($slider) {
                return $slider->created_at->diffForHumans();
            })
            ->editColumn('action', function ($slider) {
                return '
                        <a href="'.route('sliders.edit', $slider->id).'" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter'.$slider->id.'"><i class="fa fa-trash-o"></i></a>
                    ';
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->sliderService->storeSliders(
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('sliders.index')->with('success', __('messages.create_success', ['name' => 'Slider']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $slider = $this->sliderService->getSlidersById(
                slidersId: $id
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.sliders.edit', ([
            'slider' => $slider,
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->sliderService->updateSliders(
                slidersId: $id,
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('sliders.index')->with('success', __('messages.update_success', ['name' => 'Slider']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $slider = $this->sliderService->deleteSlidersData(
                slidersId: $id
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('sliders.index')->with('success', __('messages.delete_success', ['name' => 'Slider']));
    }
}
