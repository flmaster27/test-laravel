<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class TokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->bearerToken() !== env('API_TOKEN')) {
            return response()->json([
                'status' => 'error',
                'code' => Response::HTTP_FORBIDDEN,
                'message' => 'Invalid token',
            ], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
