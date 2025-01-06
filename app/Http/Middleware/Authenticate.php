<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Get the pathe the user should be redirected to whne they are not loggedin
     */
    protected function redirectTo(Request $request): ?string
    {
        if(!Auth::check()) {
            return redirect()->route('login.index');
        }
    }

}
