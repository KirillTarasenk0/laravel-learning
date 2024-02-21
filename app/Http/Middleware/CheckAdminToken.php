<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminToken
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('Authorization') === 'Admin') {
            return redirect()->route('admin');
        }
        return $next($request);
    }
}
