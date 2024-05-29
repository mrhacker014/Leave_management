<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if($request->user() && $request->user()->role != $role){
            return redirect()->back();
        }
        elseif($request->user() && $request->user()->role != $role){
            return redirect()->back();
        }
        elseif($request->user() && $request->user()->role != $role){
            return redirect()->back();
        }else{
            return $next($request);
        } 
    }
}
