<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('egyptian_phone', function ($attribute, $value, $parameters, $validator) {
            // The regular expression for an Egyptian phone number
            $pattern = '/^(?:\+20|0)?1[0-9]{9}$/';

            // Check if the value matches the pattern
            return preg_match($pattern, $value);
        });

        Validator::replacer('egyptian_phone', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The :attribute must be a valid Egyptian phone number.');
        });
    }
}
