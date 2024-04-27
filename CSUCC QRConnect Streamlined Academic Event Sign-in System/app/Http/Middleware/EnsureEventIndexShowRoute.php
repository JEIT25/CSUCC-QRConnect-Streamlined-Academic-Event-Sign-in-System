<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureEventIndexShowRoute
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the referer header exists
        if ($request->hasHeader('referer')) {
            // Extract the referer URL
            $referer = $request->header('referer');

            // Create a new request using the referer URL
            $subRequest = Request::create($referer);

            // Extract the route name from the subRequest
            $routeName = app('router')->getRoutes()->match($subRequest)->getName();

            // Compare the extracted route name with the expected route name
            if ($routeName !== 'events.show' || $routeName !== 'events.index') {
                // Redirect back if the request did not originate from the event show route
                return redirect()->route('events.index')->with('error', 'Access denied.');
            }
        } else {
            // Handle case when referer header is not present
            return redirect()->route('events.index')->with('error', 'Access denied.');
        }

        return $next($request);
    }
}
