<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotSuper
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
        if (! $request->user()->isSuper()) {
            session()->flash('flash_message', 'You are not authorised');
            return redirect('/');
        }

        return $next($request);
    }
}
