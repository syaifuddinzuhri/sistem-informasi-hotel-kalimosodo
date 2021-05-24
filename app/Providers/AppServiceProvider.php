<?php

namespace App\Providers;

use App\Models\Reservation;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $reservation = Reservation::all();
        $date_now = date("Y-m-d"); // this format is string comparable
        foreach ($reservation as $item) {
            if ($date_now > $item->check_out) {
                $item->delete();
            }
        }
    }
}