<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthBasic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $USERNAME = 'Auriga';
        $PASSWORD = 'mostsecurepasswordintheworld';

        if ($request->getUser() !== $USERNAME || $request->getPassword() !== $PASSWORD) {
            return response('Unauthorized', 401, ['WWW-Authenticate' => 'Basic']);
        }
        return $next($request);
    }
}
