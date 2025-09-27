<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetDefaultLangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $defaultLang = getPathLang() ?? authUser()?->default_lang;

        app()->setLocale($defaultLang);

        if (authUser()->default_lang != $defaultLang)
            authUser()->update(['default_lang' => $defaultLang]);

        return $next($request);
    }
}
