<?php

namespace App\Providers;

use App\Models\EquipmentLocation;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;
use Auth;

class ViewServiceProvider extends ServiceProvider
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
     * @return void
     */
    public function boot()
    {
        View::composer(['users.create', 'users.edit'], function ($view) {
            $data = Role::select('id', 'name')->get();
            return $view->with(
                'roles',
                $data
            );
        });
    }
}
