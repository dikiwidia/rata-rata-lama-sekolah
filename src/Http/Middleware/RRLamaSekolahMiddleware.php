<?php

namespace Bantenprov\RRLamaSekolah\Http\Middleware;

use Closure;

/**
 * The RRLamaSekolahMiddleware class.
 *
 * @package Bantenprov\RRLamaSekolah
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RRLamaSekolahMiddleware
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
        return $next($request);
    }
}
