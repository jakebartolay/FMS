<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckProfileCompletion
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
        $user = $request->user();

        if (!$user || !$user->firstname || !$user->lastname) {
            return redirect()->route('profile.edit')->with('error', 'Please complete your profile');
        }

        return $next($request);
    }
}
