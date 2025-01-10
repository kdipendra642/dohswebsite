<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(
        AuthService $authService
    ) {
        $this->authService = $authService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function signin(LoginRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();

            $this->authService->login($data);
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }
        DB::commit();

        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     */
    public function signout()
    {
        try {
            $this->authService->logout();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return redirect()->route('login.index');
    }

    /**
     * Get My Profile
     */
    public function myProfile()
    {
        try {
            $user = $this->authService->getMyProfile();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

        return view('backend.profile.index', ([
            'user' => $user,
        ]));
    }

    public function updatePassword(PasswordRequest $request, string $userId)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $this->authService->updatePassword(
                data: $data,
                userId: $userId
            );
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', $th->getMessage());
        }

        DB::commit();

        return redirect()->back()->with('success', 'Password updated successfully.');

    }
}
