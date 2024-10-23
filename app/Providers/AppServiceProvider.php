<?php

namespace App\Providers;

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
        Gate::define('access-kaprodi', function ($user) {
            return $user->role == 'kaprodi';
        });
        Gate::define('access-dosen', function ($user) {
            return $user->role == 'dosen';
        });
        Gate::define('access-dosen_wali', function ($user) {
            return $user->role == 'dosen_wali';
        });
        Gate::define('access-mahasiswa', function ($user) {
            return $user->role == 'mahasiswa';
        });
    }
}
