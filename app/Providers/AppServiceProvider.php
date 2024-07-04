<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

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
            $role = session('user_role');
            $layout = 'default';
    
            if ($role === 'giao_vien') {
                $layout = 'giao_vien.trang-chu';
            } elseif ($role === 'admin') {
                $layout = 'admin.trang-chu';
            } elseif ($role === 'tro_ly_khoa') {
                $layout = 'tro_ly_khoa.trang-chu';
            } elseif ($role === 'sinh_vien') {
                $layout = 'sinh_vien.trang-chu';
            }
    
            $view->with('layout', $layout);
            $view->with('Carbon', new Carbon);
        });
       
    }
}
