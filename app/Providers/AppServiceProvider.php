<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Order;
use App\Models\Submission;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
   public function boot(): void
{
    View::composer('*', function ($view) {

        $pendingOrders = Order::where('status', 'Pending')->count();

        $pendingSubmissions = Submission::where('status', 'Pending')->count();

        $view->with([
            'pendingOrders' => $pendingOrders,
            'pendingSubmissions' => $pendingSubmissions,
        ]);
    });
}
}
