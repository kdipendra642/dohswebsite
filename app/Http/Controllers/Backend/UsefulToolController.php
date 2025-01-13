<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\UsefulToolRequest;
use App\Services\UsefulToolService;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UsefulToolController extends BaseController
{
    protected $usefulToolService;

    public function __construct(
        UsefulToolService $usefulToolService
    ) {
        $this->usefulToolService = $usefulToolService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $usefulTools = $this->usefulToolService->getAllUsefulTools();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.usefultools.index', [
            'usefulTools' => $usefulTools,
        ]);
    }

    /**
     * Get a list of data
     */
    public function usefultoolsData()
    {
        try {
            $usefulTools = $this->usefulToolService->getAllUsefulTools();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return DataTables::of($usefulTools)
            ->editColumn('document_url', function ($usefulTool) {
                if ($usefulTool->getMedia('icons')->isNotEmpty()) {
                    $mediaItem = $usefulTool->getMedia('icons')->first();

                    return [
                        'media' => $mediaItem->getUrl(),
                        'type' => $mediaItem->mime_type,
                    ];
                }

                return '';
            })
            ->editColumn('created_at', function ($usefulTool) {
                return $usefulTool->created_at->diffForHumans();
            })
            ->editColumn('action', function ($usefulTool) {
                return '
                    <a href="'.route('usefultools.edit', $usefulTool->id).'" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter'.$usefulTool->id.'"><i class="fa fa-trash-o"></i></a>
                ';
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.usefultools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsefulToolRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->usefulToolService->storeUsefulTools(
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('usefultools.index')->with('success', __('messages.create_success', ['name' => 'Useful Tool']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $usefulTools = $this->usefulToolService->getUsefulToolsById(
                usefulToolsId: $id
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.usefultools.edit', ([
            'usefulTools' => $usefulTools,
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsefulToolRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->usefulToolService->updateUsefulTools(
                usefulToolsId: $id,
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('usefultools.index')->with('success', __('messages.update_success', ['name' => 'Useful Tool']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $usefulTools = $this->usefulToolService->deleteUsefulToolsData(
                usefulToolsId: $id
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('usefultools.index')->with('success', __('messages.delete_success', ['name' => 'Useful Tool']));
    }
}
