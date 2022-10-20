<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolisy;
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
//        Post::class => PostPolisy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create', function (User $user) {
            return in_array($user->role_name, ['admin','manager']);
        });

        Gate::define('update', function (User $user, Post $post) {
            return $user->id === $post->user_id && $user->role_name === 'manager' || $user->role_name === 'admin';
        });

        Gate::define('delete', function (User $user) {
            return $user->role_name === 'admin';
        });

        Gate::define('view', function (User $user) {
            return true;
        });
    }
}
