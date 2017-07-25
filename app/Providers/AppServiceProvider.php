<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
Use App\Notification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        \Carbon\Carbon::setlocale('id');
        // View::composer('*', 'App\Http\ViewComposers\HeaderComposer');
        View::composer('*', function($view){
            if (Auth::check()) {
                $notifcountunreadable = Notification::where('user_id', Auth::user()->id)->where('read', '1')->count();
                $notification = Notification::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
                $view->with('notif', $notification);
                $view->with('notifcount', $notifcountunreadable);

            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
