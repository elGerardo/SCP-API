<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class VerifyAdminToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if( Crypt::decrypt("eyJpdiI6InMxN1FaWlpGbDhPcDRlQWpxYzVXYkE9PSIsInZhbHVlIjoiV2wxOFpJQW1oM2VIOWFyMjVsckFRL0t4eDJ0VHJ0bG1MVmM4elJ3TGd4ST0iLCJtYWMiOiI0YWZiYzljZWIzYjRiZDdjMjQ3ODlkODZkMWY3Yzg3NzA1N2Q2ZWI0NWI2ZDEyM2Y3ZGIwNjJkZmQ3MzQ1NDBiIiwidGFnIjoiIn0=") != $request->header("pwd") )
        {
            return response()->json(["status" => 403, "message" => "Not Authorized"]);
        }

        return $next($request);
    }
}
