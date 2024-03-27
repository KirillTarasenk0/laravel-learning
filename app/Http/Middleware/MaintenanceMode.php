<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceMode
{
    public function handle(Request $request, Closure $next): Response
    {
        if (config('app.maintenance.maintenance_mod')) {
            return response()->view('technicalWorks');
        }
        return $next($request);
    }
}
