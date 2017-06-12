<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Role;
use App\Policies\RolePolicy;
use App\User;
use App\Policies\UserPolicy;
use App\Blog;
use App\Policies\BlogPolicy;
use App\BlogCategory;
use App\Policies\BlogCategoryPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        Blog::class => BlogPolicy::class,
        BlogCategory::class => BlogCategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
