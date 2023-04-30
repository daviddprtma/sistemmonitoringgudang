<?php

namespace App\Providers;

use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('add-permission',function($user){
            return ($user->role == 'admin'
            ? Response::allow()
            : Response::deny('Anda harus menjadi admin terlebih dahulu')
        );
        });

        Gate::define('delete-permission',function($user){
            return ($user->role == 'admin'
            ? Response::allow()
            : Response::deny('Anda harus menjadi admin terlebih dahulu')
        );
        });

        Gate::define('edit-permission',function($user){
            return ($user->role == 'admin'
            ? Response::allow()
            : Response::deny('Anda harus menjadi admin terlebih dahulu')
        );
        });

        Gate::define('aksi',function($user){
            return ($user->role == 'admin'
            ? Response::allow()
            : Response::deny('Anda harus menjadi admin terlebih dahulu')
        );
        });


        //
    }
}
