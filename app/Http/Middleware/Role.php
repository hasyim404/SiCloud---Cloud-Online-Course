<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // return $next($request);
        // Single Role
        // if (Auth::check() && Auth::user()->role == 'role') {
        //     return $next($request);
        // }

        // Multiple Role
        if (Auth::check() ) {
            $roles = explode('-',$role);
            foreach ($roles as $group) {
                if (Auth::user()->role == $group) {
                    return $next($request);
                }
            }
        }
        Alert::warning('Access Denied', 'You Cannot Access the Page');
        return redirect('/home');
    }
}
