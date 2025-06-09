<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next): Response
    {
        $role = $request->query('role');

        if ($role !== 'admin') {
            return response('Maaf, akses ini hanya untuk admin.', 403);
        }

        return $next($request);
    }
}
