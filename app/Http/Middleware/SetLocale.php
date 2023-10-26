<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function __construct(Application $app, Request $request) {
        $this->app = $app;
        $this->request = $request;
    }
        /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(! $request->user()) {
            $language = session('my_locale', config('app.locale'));
        } else {
            $language = $request->user()->language;
        }
        if (!empty($language)) {
            $this->app->setLocale($language);
        }    

        return $next($request);
    }
}
