<?php

namespace App\Providers;

use App\Oplata;
use App\Student;

use Illuminate\Support\ServiceProvider;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       /* DB::listen(function($query) {
             dump($query->sql, $query->bindings,$query->time);

        });*/

        Student::created(function ($student) {
            $student->oplata()->save(new Oplata());
            return true;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
