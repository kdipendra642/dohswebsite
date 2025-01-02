<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $userService;

    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = $this->userService->getAllUsers();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->userService->storeUsers(
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $user = $this->userService->getUserById(
                userId: $id
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.users.edit', ([
            'users' => $user,
        ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $this->userService->updateUser(
                userId: $id,
                data: $data
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $user = $this->userService->deleteUserData(
                userId: $id
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
