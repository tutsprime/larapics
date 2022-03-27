<?php

namespace App\Providers;

use App\Enums\Role;
use App\Models\Image;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrapFive();

        Gate::define('update-image', function (User $user, Image $image) {
            return $user->id === $image->user_id || $user->role === Role::Editor;
        });
        
        Gate::define('delete-image', function (User $user, Image $image) {
            return $user->id === $image->user_id;
        });
    }
}
