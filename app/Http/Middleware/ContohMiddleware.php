<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ContohMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

     //closure seperti function, nextnya mau eksekusi atau engga, 
     //bisa ke middleware selanjutnya atau ke controller
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('X-API-Key');
        if($apiKey != '123') {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
            return response("access denied",401);
        }
        return $next($request);
    }
}
