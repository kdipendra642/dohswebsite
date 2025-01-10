<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\PopUpRequest;
use App\Services\PopUpService;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PopUpController extends BaseController
{
    protected $popUpService;

    public function __construct(
        PopUpService $popUpService,
    ) {
        $this->popUpService = $popUpService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $popups = $this->popUpService->getAllPopups();

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.popups.index', [
            'popups' => $popups,
        ]);
    }

    /**
     * Get List of All Data
     */
    public function popupsData()
    {
        try {
            $popups = $this->popUpService->getAllPopups();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return DataTables::of($popups)
            // ->editColumn('status', function ($popup) {
            //     return $popup->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
            // })
            ->editColumn('document_url', function ($popup) {
                if ($popup->getMedia('pop-ups')->isNotEmpty()) {
                    $mediaItem = $popup->getMedia('pop-ups')->first();

                    return [
                        'media' => $mediaItem->getUrl(),
                        'type' => $mediaItem->mime_type,
                    ];
                }

                return '';
            })
            ->editColumn('created_at', function ($popup) {
                return $popup->created_at->diffForHumans();
            })
            ->editColumn('action', function ($popup) {
                return '
                        <a href="'.route('popups.edit', $popup->id).'" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter'.$popup->id.'"><i class="fa fa-trash-o"></i></a>
                    ';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.popups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PopUpRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->popUpService->storePopups(
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('popups.index')->with('success', __('messages.create_success', ['name' => 'Popups']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $popups = $this->popUpService->getPopupsById(
                popupsId: $id
            );

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.popups.edit', ([
            'popups' => $popups,
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PopUpRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->popUpService->updatePopups(
                popupsId: $id,
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('popups.index')->with('success', __('messages.update_success', ['name' => 'Popups']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $popups = $this->popUpService->deletePopupsData(
                popupsId: $id
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('popups.index')->with('success', __('messages.delete_success', ['name' => 'Popups']));
    }
}
