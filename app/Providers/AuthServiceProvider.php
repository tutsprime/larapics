<?php

namespace App\Providers;

use App\Enums\Role;
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
        // Image::class => PolicyForImage::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('update-image', [PolicyForImage::class, 'update']);
        
        // Gate::define('delete-image', [PolicyForImage::class, 'delete']);

        Gate::before(function ($user, $ability) {
            if ($user->role === Role::Admin) {
                return true;
            }
        });
    }
}
