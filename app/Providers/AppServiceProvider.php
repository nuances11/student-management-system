<?php

namespace App\Providers;

use App\Schoolyear;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        // Get Current active year
        $year = DB::table('schoolyears')->where('is_active', 1)->first();
        view()->share('active_year', $year->year);
    }
}
