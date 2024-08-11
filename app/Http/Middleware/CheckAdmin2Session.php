<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin2Session
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    if (session()->has('employer_id') && session('employer_id') == 43) {
        return $next($request);
    }

    // Redirect or handle as needed (e.g., redirect to login)
    return redirect('login_register');
}

}
