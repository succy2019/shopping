<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        $admin = Auth::guard('admin')->user();

        // Check if the authenticated admin has the required role
        if ($admin && $admin->role === $role) {
            return $next($request);
        }

        // Redirect unauthorized access
        return redirect()->route('admin.dashboard')->with('error', 'Unauthorized access');
    }
}
