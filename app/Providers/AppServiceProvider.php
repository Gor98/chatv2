<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\RoomContract;
use App\Http\Repositories\RoomRepository;

use App\Contracts\MessageContract;
use App\Http\Repositories\MessageRepository;

use App\Contracts\UserContract;
use App\Http\Repositories\UserRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            RoomContract::class,
            RoomRepository::class
        );
        $this->app->bind(
            MessageContract::class,
            MessageRepository::class
        );
        $this->app->bind(
            UserContract::class,
            UserRepository::class
        );

    }
}
