<?php

namespace App\Providers;

use App\Models\File;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
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
        Gate::define('mustOwner', function (User $user, File $file) {
            return $user->id === $file->user_id;
        });
        Gate::define('adminOnly', function (User $user) {
            return $user->role === 'admin';
        });

        RateLimiter::for('requestReset', function (Request $request) {
            return Limit::perMinute(2)->by($request->user()?->id ?: $request->ip());
        });
        Paginator::useBootstrapFive();
    }
}
