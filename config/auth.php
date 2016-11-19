<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
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

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
    ],  

    /*'multi' => [
        'users' => [
            'driver' => 'eloquent',
            'model'  => App\Usuario::class,
            'table'  => 'usuarios'
        ],
        'admin' => [
            'driver' => 'eloquent',
            'model'  => App\Administrador::class,
            'table'  => 'administradores'
        ]
    ],*/

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Usuario::class,
            'table'=>'usuarios',
            'reminder'=>[
                'nombreUsuario'=>'nombreUsuario.request',
                'table' => 'token',
                'expire' => 60
            ],

        ],

        'admin' => [
            'driver' => 'eloquent',
            'model'=>App\Administrador::class,            
        ],
    ],


    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
