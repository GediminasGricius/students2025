<?php

namespace App\Providers;

use App\Models\Lecturer;
use App\Models\Student;
use App\Policies\LecturerPolicy;
use Illuminate\Support\Facades\Gate;
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
        Gate::policy(Lecturer::class, LecturerPolicy::class);
        //
        Gate::define('changeLanguage', function ($user) {
            return true;
        });

        Gate::define('deleteStudent', function ($user, Student $student) {
            if ($user->id==$student->user_id){
                return true;
            }

            if ($user->type=='admin'){
                return true;
            }
            return false;

        });
        Gate::define('editStudent', function ($user, Student $student) {
            if ($user->id==$student->user_id){
                return true;
            }

            if ($user->type=='admin'){
                return true;
            }
            return false;

        });
    }
}
