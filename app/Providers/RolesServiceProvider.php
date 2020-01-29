<?php

namespace App\Providers;

use App\Permissions;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return bool
     */
    public function boot()
    {

//        Blade::directive('role', function ($role){
//                return '<?php if(auth()->check() && auth()->user()->hasRole({$role})) :';
//        });
//        Blade::directive('endrole', function ($role){
/*                return '<?php endif; ?>';*/
//        });

    }
}
