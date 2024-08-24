<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class SupervisorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
     
        if ($request->user()->role_name == 'Supervisor') {
            // Redirect or abort the request based on your logic
            // abort(403, 'Unauthorized');

            // Flash an error message to the session
            Session::flash('unauthorized', 'You do not have permission to access this page.');

            // Redirect back to the previous page
            return redirect()->back();
        }
     
        return $next($request);
    }
}
