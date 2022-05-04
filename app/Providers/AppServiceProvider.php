<?php

namespace App\Providers;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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

        view()->composer('*', function($view){

            if (Auth::check()) {

                $newMsgs = Message::where('recipient_id', Auth::id())->where('is_seen', 0)->count();
                $newMsgs = $newMsgs > 0 ? ' (' . $newMsgs . ')' : '';
                view()->share('unseen', $newMsgs);

            }

        });

    }
}
