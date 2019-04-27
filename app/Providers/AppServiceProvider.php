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
        $user = DB::table('users')->get();
        $user_count = $user->count();
        view()->share('user_count', $user_count);
        $student = DB::table('students')->get();
        $student_count = $student->count();
        view()->share('student_count', $student_count);
        $enroll = DB::table('student_classes')->get();
        $enroll_count = $enroll->count();
        view()->share('enroll_count', $enroll_count);
    }
}
