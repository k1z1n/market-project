<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDeveloperConfirmation
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth('developer')->check()) {
            if (auth('developer')->user()->confirmation !== 'Подтвержен') {
                return $next($request);
            }
            return redirect()->route('developer.profile');
        }
        return redirect()->route('developer.auth.login');
    }
}
