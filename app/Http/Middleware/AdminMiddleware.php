<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
           if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->user_type != 'admin') {
            abort(403, 'ليس لديك صلاحية للوصول إلى هذه الصفحة.');
        }
        return $next($request);
    }
}
