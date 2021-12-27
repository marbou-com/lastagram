<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\View;
use App\User;

class SideServiceProvider extends ServiceProvider
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
        View::composer('*', function ($view) {
            
            $users="";
            if(Auth::check()){
                $user = Auth::user();
                $users = User::where('id', '<>' , $user->id)->get();
    
                //dd($users);
                //$view->with('users', $users);
     
            }

            $view->with('users', $users);

        });
    }
}
