<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class isAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
// if(Auth::user()->role==1){
//     return $next($request);
// }
//     abort(401);   
if(Auth::user()->role==$role){
    return $next($request);
}else{
    return redirect()->back();
    // abort(401); 
}
    }
}
