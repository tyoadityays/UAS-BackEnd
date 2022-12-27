<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

//use App\Models\User;
//use Auth;


class CekRole
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
        $roles = array_slice(func_get_args(), 2);
        foreach ($roles as $role) {
            $user = auth()->user()->role;
            if($user == $role){
                return $next($request);
            }
        }
        abort(401);
    }
}
