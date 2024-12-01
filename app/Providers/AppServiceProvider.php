<?php

namespace App\Providers;

use App\View\Composers\MenuComposer;
use Illuminate\Support\Facades\View;
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

    //Hiện dữ liệu dùng chung
    public function boot(): void
    {
        //B2. Đăng ký comporser
        //Vào file App\Providers\AppServiceProvider.php
        View::composer('partials.header', MenuComposer::class);
    }
}
