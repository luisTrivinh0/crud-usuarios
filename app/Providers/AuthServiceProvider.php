<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Admin;
use App\Models\Moderator;
use App\Models\Financial;
use App\Policies\AdminPolicy;
use App\Policies\ModeratorPolicy;
use App\Policies\FinancialPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Admin::class => AdminPolicy::class,
        Moderator::class => ModeratorPolicy::class,
        Financial::class => FinancialPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-admins', [AdminPolicy::class, 'view']);
        Gate::define('view-admin', [AdminPolicy::class, 'view']);
        Gate::define('create-admin', [AdminPolicy::class, 'create']);
        Gate::define('update-admin', [AdminPolicy::class, 'update']);
        Gate::define('delete-admin', [AdminPolicy::class, 'delete']);

        Gate::define('view-moderators', [ModeratorPolicy::class, 'view']);
        Gate::define('view-moderator', [ModeratorPolicy::class, 'view']);

        Gate::define('edit-financial', [FinancialPolicy::class, 'edit']);
        Gate::define('delete-financial', [FinancialPolicy::class, 'delete']);
    }
}
