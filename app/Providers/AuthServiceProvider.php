<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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
        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            Gate::define($permission->name, function ($user) use($permission) {
               return $user->hasPermission($permission->name);
            });
        }

        Gate::before(function ($user){
            if($user->hasRole('Superadmin')) {
                return true;
            }
        });
    }
}
