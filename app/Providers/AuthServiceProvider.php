<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Muetra en el sidebar los botones segun el permiso

        Gate::define('usuarios', function ($user){
            return leerJson(auth()->user()->permisos, 'usuarios.index') == true || auth()->user()->role == 100;
        });

        Gate::define('parametros', function ($user){
            return $user->role == 100;
        });

        Gate::define('stores', function ($user){
            return leerJson($user->permisos, 'stores.index') == true || $user->role == 100;
        });

        Gate::define('prueba', function ($user){
           return true;
        });


    }
}
