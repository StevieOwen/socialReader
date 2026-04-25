<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\LaravelPdf\Facades\Pdf;

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
    // public function boot(): void
    // {
    //     //
    // }

    public function boot(): void
    {
    Pdf::default()
        ->withBrowsershot(function ($browsershot) {
            // If you are using Laravel Herd, these paths are usually:
            $browsershot->setNodeBinary('node')
                        ->setNpmBinary('npm');
            
            // On Windows, if it still fails, use the absolute path:
            // $browsershot->setNodeBinary('C:\Program Files\nodejs\node.exe');
        });
    }
}
