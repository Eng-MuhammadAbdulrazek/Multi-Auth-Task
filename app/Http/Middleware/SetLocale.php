<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
  
    public function handle(Request $request, Closure $next): Response
    {
        // Get the first segment of the URL (locale)
        $locale = $request->segment(1);
        // Check if the first segment is a valid locale
        if (in_array($locale, ['en', 'ar'])) {
            app()->setLocale($locale);
        }
       else {
            app()->setLocale(config('app.fallback_locale'));
        }
        return $next($request);
    }
}
