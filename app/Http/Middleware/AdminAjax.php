<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Http\Request;

class adminAjax
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
        if($request->ajax() && !auth()->user()->hasRole('Admin'))
        {
            //\Session::flash('flash_message_delete','You don\'t have the permission to delete this record! Only Administrators can delete records.');

            return \Redirect::back();
        }

        return $next($request);
    }
}
