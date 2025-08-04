<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // अगर user logged in है तो redirect करो profile page पर
            return redirect()->route('account.profile');
        }

        // अगर user authenticated नहीं है, तो request को आगे बढ़ाओ
        return $next($request);
    }
}
