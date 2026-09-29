<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = $request->input('role');
        if ($role !== 'admin') {
            return response()->json([
                'message' => 'Bạn không có quyền truy cập',
            ], 403);
        }
        return $next($request);
    }
}
