<?php

namespace App\Providers;

use App\Models\Cars;
use App\Models\Clients;
use App\Models\Services;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

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
        if (Clients::count() == 0) {
            Artisan::call('db:seed', ['--class' => 'ClientsTableSeeder']);
        }
        
        if (Cars::count() == 0) {
            Artisan::call('db:seed', ['--class' => 'CarsTableSeeder']);
        }
        
        if (Services::count() == 0) {
            Artisan::call('db:seed', ['--class' => 'ServicesTableSeeder']);
        }
    }
}
