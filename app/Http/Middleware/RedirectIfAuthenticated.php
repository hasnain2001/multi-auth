<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * The callback that should be used to generate the authentication redirect path.
     *
     * @var callable|null
     */
    protected static $redirectToCallback;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // Check if the user is authenticated with the current guard
            if (Auth::guard($guard)->check()) {
                
                // If the user is a teacher trying to access admin routes
                if (($request->routeIs('admin.login') || $request->routeIs('admin.dashboard')) && Auth::guard('teacher')->check()) {
                    return redirect()->route('teacher.dashboard');
                }

                // If the user is an admin trying to access teacher or user routes
                if (($request->routeIs('teacher.login') || $request->routeIs('teacher.dashboard')) && Auth::guard('admin')->check()) {
                    return redirect()->route('admin.dashboard');
                }

                // If the user is logged in as 'user' trying to access admin routes
                if (($request->routeIs('admin.login') || $request->routeIs('admin.dashboard')) && Auth::guard('web')->check()) {
                    return redirect()->route('user.dashboard');
                }

                // Default redirection for authenticated users based on guard
                return redirect($this->redirectTo($request));
            }
        }
        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->routeIs('admin.login')) {
            return route('admin.dashboard');
        }
        if ($request->routeIs('employe.login')) {
            return route('employe.dashboard');
        }
        if ($request->routeIs('login')) {
            return route('dashboard');
        }
        return static::$redirectToCallback
            ? call_user_func(static::$redirectToCallback, $request)
            : $this->defaultRedirectUri();
    }

    /**
     * Get the default URI the user should be redirected to when they are authenticated.
     */
    protected function defaultRedirectUri(): string
    {
        foreach (['dashboard', 'home'] as $uri) {
            if (Route::has($uri)) {
                return route($uri);
            }
        }

        return '/';
    }

    /**
     * Specify the callback that should be used to generate the redirect path.
     *
     * @param  callable  $redirectToCallback
     * @return void
     */
    public static function redirectUsing(callable $redirectToCallback)
    {
        static::$redirectToCallback = $redirectToCallback;
    }
}
