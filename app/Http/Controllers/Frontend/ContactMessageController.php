<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\ContactMessageRequest;
use App\Services\ContactMessageService;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ContactMessageController extends BaseController
{
    protected $contactMessageService;

    public function __construct(
        ContactMessageService $contactMessageService
    ) {
        $this->contactMessageService = $contactMessageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $contactMessages = $this->contactMessageService->getAllContactMessages();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.messages.index', [
            'contactMessages' => $contactMessages,
        ]);
    }

    /**
     * Get a list of messages
     */
    public function messagesData()
    {
        try {
            $contactMessages = $this->contactMessageService->getAllContactMessages();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return DataTables::of($contactMessages)
            ->editColumn('created_at', function ($contactMessage) {
                return $contactMessage->created_at->diffForHumans();
            })
            ->editColumn('action', function ($contactMessage) {
                return '
                    <a href="'.route('staffs.edit', $contactMessage->id).'" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter'.$contactMessage->id.'"><i class="fa fa-trash-o"></i></a>
                ';
            })
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactMessageRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $data = array_merge($data, [
                'ip_address' => $request->ips()[0],
            ]);

            $this->contactMessageService->storeContactMessages(
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('contact')->with('success', 'Message sent successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $ticker = $this->contactMessageService->deleteContactMessagesData(
                contactMessagesId: $id
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('messages.index')->with('success', 'Message deleted successfully.');
    }
}
