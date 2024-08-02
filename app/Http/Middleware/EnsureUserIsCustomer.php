<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsCustomer
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user login dan memiliki role 'customer'
        if (auth()->check() && auth()->user()->role === 'customer') {
            return $next($request);
        }

        // Redirect jika bukan customer
        return redirect('/')->with('error', 'You do not have access to this page.');
    }
}
