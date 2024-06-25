    <?php

    return [

        'defaults' => [
            'guard' => env('AUTH_GUARD', 'web'),
            'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
        ],

        'guards' => [
            'web' => [
                'driver' => 'session',
                'provider' => 'users',
            ],
            'admin' => [
                'driver' => 'session',
                'provider' => 'admin',
            ],
            'giao_vien' => [
                'driver' => 'session',
                'provider' => 'giao_vien',
            ],
            'sinh_vien' => [
                'driver' => 'session',
                'provider' => 'sinh_vien',
            ],
            'tro_ly_khoa' => [
                'driver' => 'session',
                'provider' => 'tro_ly_khoa',
            ],
        ],

        'providers' => [
            'users' => [
                'driver' => 'eloquent',
                'model' => env('AUTH_MODEL', App\Models\User::class),
            ],
            'admin' => [
                'driver' => 'eloquent',
                'model' => App\Models\Admin::class,
            ],
            'giao_vien' => [
                'driver' => 'eloquent',
                'model' => App\Models\GiaoVien::class,
            ],
            'sinh_vien' => [
                'driver' => 'eloquent',
                'model' => App\Models\SinhVien::class,
            ],
            'tro_ly_khoa' => [
                'driver' => 'eloquent',
                'model' => App\Models\TroLyKhoa::class,
            ],
        ],

        'passwords' => [
            'users' => [
                'provider' => 'users',
                'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
                'expire' => 60,
                'throttle' => 60,
            ],
            'admin' => [
                'provider' => 'admin',
                'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
                'expire' => 60,
                'throttle' => 60,
            ],
            'giao_vien' => [
                'provider' => 'giao_vien',
                'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
                'expire' => 60,
                'throttle' => 60,
            ],
            'sinh_vien' => [
                'provider' => 'sinh_vien',
                'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
                'expire' => 60,
                'throttle' => 60,
            ],
            'tro_ly_khoa'=> [
                'provider' => 'tro_ly_khoa',
                'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
                'expire' => 60,
                'throttle' => 60,
            ],
        ],

        'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

    ];
