<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin-only', function($user){

            if($user->user_type == 'admin')
            {
                return true;
            }
       });

        Gate::define('user-only', function($user){
            if($user->user_type == 'user')
            {
                return true;
            }
        });

        Gate::define('pharmacy-only', function($user){
            if($user->user_type == 'pharmacy')
            {
                return true;
            }
        });
    }
}
