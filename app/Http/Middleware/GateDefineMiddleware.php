<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class GateDefineMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $permissions = Permission::whereHas("roles", function ($query) {
                return $query->where("roles.id", Auth::user()->role_id);
            })->get()->toArray();
            foreach ($permissions as $permission) {
                Gate::define($permission["name"], fn() => true);
            }
        }
        return $next($request);
    }
}
