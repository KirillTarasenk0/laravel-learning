<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\AppRequestLogger;

class RequestLogger
{
    public function handle(Request $request, Closure $next): Response
    {
        AppRequestLogger::create([
            'httpMethod' => $request->method(),
            'url' => $request->url(),
            'ip' => $request->ip(),
            'timestamp' => now()
        ]);
        return $next($request);
    }
}
