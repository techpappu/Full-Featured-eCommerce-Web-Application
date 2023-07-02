<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class CheckPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeName = $request->route()->getName();
        $user = Auth::user();
        if (! $user) {
            return redirect('/admin/login');
        }

        $permissions = $user->getAllPermissions()->pluck('name')->toArray();

        if (!in_array($routeName, $permissions)) {
            return abort(403, 'You do not have permission to access this route');
        }

        return $next($request);
    }
}
