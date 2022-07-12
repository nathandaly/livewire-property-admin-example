<?php

namespace App\Http\Middleware;

use Closure;

class TwindigAdmin
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
        // Check if Logged in user email is Anthony or John
        if (! in_array($request->user()->email, ['anthony.codling@twindig.com', 'john.blackmore@twindig.com'])) {
            return redirect(route('home'))->with('error', 'You are not authorised to perform that action');
        }

        return $next($request);
    }
}
