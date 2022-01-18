<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        //
    }

    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        Blade::directive('currency', function ( $expression ) { return "Rp. <?php echo number_format($expression,0,',','.'); ?>"; });

        $this->registerPolicies();

        if (! $this->app->routesAreCached()) {
            Passport::routes();
        }
    }
}
