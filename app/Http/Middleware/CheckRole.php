<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = auth('api')->user();
        
        if (!in_array($user->role, $role)) {
            return response()->json([
                'message' => 'Bạn không có quyền truy cập',
            ], 403);
        }

        return $next($request);
    }
}
