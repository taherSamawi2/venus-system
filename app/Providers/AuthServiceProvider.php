<?php

namespace App\Providers;

use App\Policies\ProjectPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use App\Project;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
          Project::class => ProjectPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));

        Gate::before(function ($user, $ability) {
            if ($user->abilities()->contains($ability)) {
                return true;
            }
        });


//        /* define a admin role */
//        Gate::define('isAdmin', function($user) {
//            return $user->role == 'admin';
//        });
//
//        /* define a member role */
//        Gate::define('isMember', function($user) {
//            return $user->role == 'member';
//        });
//
//        /* define a customer role */
//        Gate::define('isCustomer', function($user) {
//            return $user->role == 'customer';
//        });
    }
}
