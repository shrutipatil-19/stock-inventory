<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Gate for Admin
        Gate::define('admin-access', function ($user) {
            return $user->role === 'admin';
        });

        // Gate for Staff
        Gate::define('staff-access', function ($user) {
            return $user->role === 'staff';
        });
        Gate::define('all-access', function ($user) {
            return in_array($user->role, ['staff', 'admin']);
        });
    }
}
