<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\StaffRequest;
use App\Services\StaffService;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class StaffController extends BaseController
{
    protected $staffService;

    public function __construct(
        StaffService $staffService
    ) {
        $this->staffService = $staffService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $staffs = $this->staffService->getAllStaffs();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.staffs.index', [
            'staffs' => $staffs,
        ]);
    }

    /**
     * Get a list of data
     */
    public function staffsData()
    {
        try {
            $staffs = $this->staffService->getAllStaffs();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return DataTables::of($staffs)
            ->editColumn('document_url', function ($staff) {
                if ($staff->getMedia('staffs')->isNotEmpty()) {
                    $mediaItem = $staff->getMedia('staffs')->first();

                    return [
                        'media' => $mediaItem->getUrl(),
                        'type' => $mediaItem->mime_type,
                    ];
                }

                return '';
            })
            ->editColumn('features', function ($staff) {
                if ($staff->showOnHomePage) {
                    return 'Show on Home Page';
                }
            })
            ->editColumn('created_at', function ($staff) {
                return $staff->created_at->diffForHumans();
            })
            ->editColumn('action', function ($staff) {
                return '
                    <a href="'.route('staffs.edit', $staff->id).'" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter'.$staff->id.'"><i class="fa fa-trash-o"></i></a>
                ';
            })
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->staffService->storeStaffs(
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('staffs.index')->with('success', __('messages.create_success', ['name' => 'Staff']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $staffs = $this->staffService->getStaffsById(
                staffsId: $id
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.staffs.edit', ([
            'staffs' => $staffs,
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaffRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->staffService->updateStaffs(
                staffsId: $id,
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('staffs.index')->with('success', __('messages.update_success', ['name' => 'Staff']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $staffs = $this->staffService->deleteStaffsData(
                staffsId: $id
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('staffs.index')->with('success', __('messages.delete_success', ['name' => 'Staff']));
    }
}
