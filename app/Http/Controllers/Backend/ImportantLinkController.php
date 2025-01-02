<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportantLinkRequest;
use App\Services\ImportantLinkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportantLinkController extends BaseController
{
    protected $importantLinkService;

    public function __construct(
        ImportantLinkService $importantLinkService
    ) {
        $this->importantLinkService = $importantLinkService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $importantlinks = $this->importantLinkService->getAllImportantLink();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.importantlinks.index', [
            'importantlinks' => $importantlinks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.importantlinks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImportantLinkRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->importantLinkService->storeImportantLink(
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();


        return redirect()->route('importantlinks.index')->with('success', 'Important created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $importantlinks = $this->importantLinkService->getImportantLinkById(
                importantLinkId: $id
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.importantlinks.edit', ([
            'importantlinks' => $importantlinks,
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ImportantLinkRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->importantLinkService->updateImportantLink(
                importantLinkId: $id,
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('importantlinks.index')->with('success', 'Important updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $importantlinks = $this->importantLinkService->deleteImportantLinkData(
                importantLinkId: $id
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('importantlinks.index')->with('success', 'Important deleted successfully.');
    }
}
