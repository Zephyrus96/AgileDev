<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class ViewNotificationsProvider extends ServiceProvider
{
      /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view){
            if(!Auth::guest()){
                $notifications = auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
                $view->with('notifications', $notifications);
            }
        });
    }
    
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

  
}
