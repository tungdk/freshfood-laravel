<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Admin
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth=$auth;

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest() || $this->auth->user()->role != 1) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
