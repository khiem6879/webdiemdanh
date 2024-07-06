<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UpdateLastLoginTime
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $user = $event->user;

        // Cập nhật thời gian đăng nhập cuối cùng nếu user có thuộc tính 'thoi_gian_dang_nhap_cuoi'
        if (Auth::guard('tro_ly_khoa')->check()) {
            $user->thoi_gian_dang_nhap_cuoi = Carbon::now();
            $user->save();
        }
    }
}
