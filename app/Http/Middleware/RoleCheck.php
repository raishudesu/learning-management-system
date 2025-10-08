<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (! $request->user()) {
            return back()
                ->with('warning', 'Unauthorized');
        }

        if (! $request->user()->hasRole($role)) {
            return back()
                ->with('warning', 'Unauthorized');
        }

        return $next($request);

    }
}
