<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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
        $this->registerPolicies();

        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });

        /* define a collaborator user role */
        Gate::define('isCollaborator', function($user) {
            return $user->role == 'collaborator' || $user->role == 'admin';
        });

        /* define a user role */
        Gate::define('isSubscriber', function($user) {
            return $user->role == 'subscriber' || $user->role == 'collaborator' || $user->role == 'admin';
        });
    }
}
