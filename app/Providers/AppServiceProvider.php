<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use DB;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view)  {
            $view->with('followCount', DB::table('follows')->where('follower', Auth::id())->count());
            $view->with('followerCount', DB::table('follows')->where('follow', Auth::id())->count());
            $view->with('following', DB::table('follows')->where('follower', Auth::id())->pluck('follow'));
        });
    }
}
