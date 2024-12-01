<?php

return [
    /*
    |-------------------------------------
    | Messenger display name
    |-------------------------------------
    */
    'name' => env('CHATIFY_NAME', 'Chatify Messenger'),

    /*
    |-------------------------------------
    | The disk on which to store added
    | files and derived images by default.
    |-------------------------------------
    */
    'storage_disk_name' => env('CHATIFY_STORAGE_DISK', 'public'),

    /*
    |-------------------------------------
    | Routes configurations
    |-------------------------------------
    */
    'routes' => [
        /* 'custom' => true,
        'prefix' => 'chatify',
        'middleware' => ['web', 'auth'],
        'namespace' => 'App\Http\Controllers\vendor\Chatify', */
        'prefix' => env('CHATIFY_ROUTES_PREFIX', 'dashboard/Coordinador/chat'), // Permitir rutas específicas para roles
        
        /* env('CHATIFY_ROUTES_PREFIX', function () {
            // Obtén el rol del usuario actual
            
            $user = auth()->user();

            // Determina el rol dinámicamente según tu base de datos
            if ($user && $user->trabajadores) { // Usuarios trabajadores
                if ($user->trabajadores->is_admin) {
                    return 'dashboard/admin/chat';
                } elseif ($user->trabajadores->is_coordinador) {
                    return 'dashboard/coordinador/chat';
                } elseif ($user->trabajadores->is_voluntario) {
                    return 'dashboard/voluntario/chat';
                }
            } elseif ($user && $user->beneficiarios) { // Usuarios beneficiarios
                return 'dashboard/beneficiario/chat';
            }

        }), */
        'middleware' => ['web', 'auth'],    /* env('CHATIFY_ROUTES_MIDDLEWARE', ['web', 'auth']), */ 
        'namespace' => 'App\Http\Controllers\vendor\Chatify', /* env('CHATIFY_ROUTES_NAMESPACE', 'App\Http\Controllers\vendor\Chatify'), */
    ],
    'api_routes' => [
        /* 'prefix' => env('CHATIFY_API_ROUTES_PREFIX', 'chatify/api'),
        'middleware' => env('CHATIFY_API_ROUTES_MIDDLEWARE', ['api']),
        'namespace' => env('CHATIFY_API_ROUTES_NAMESPACE', 'Chatify\Http\Controllers\Api'), */
        'prefix' => env('CHATIFY_API_ROUTES_PREFIX', 'chatify/api'),
        'middleware' => env('CHATIFY_API_ROUTES_MIDDLEWARE', ['api', 'auth:api']), // Asegura autenticación por token
        'namespace' => env('CHATIFY_API_ROUTES_NAMESPACE', 'App\Http\Controllers\vendor\Chatify\Api'),
    ],

    /*
    |-------------------------------------
    | Pusher API credentials
    |-------------------------------------
    */
    'pusher' => [
        'debug' => env('APP_DEBUG', true), // Basado en tu configuración actual
        'key' => env('PUSHER_APP_KEY', '1bd1d13abf447e1a9c6f'), // Tu clave de Pusher
        'secret' => env('PUSHER_APP_SECRET', '6a984697d18e46ff1905'), // Tu secreto de Pusher
        'app_id' => env('PUSHER_APP_ID', '1901057'), // Tu ID de aplicación en Pusher
        'options' => [
            'cluster' => env('PUSHER_APP_CLUSTER', 'us3'), // Tu clúster actual
            'host' => env('PUSHER_HOST', null), // Vacío porque usas los servidores de Pusher
            'port' => env('PUSHER_PORT', 443), // Puerto seguro estándar para HTTPS
            'scheme' => env('PUSHER_SCHEME', 'https'), // Conexión segura
            'encrypted' => true, // Esto asegura que la conexión sea segura
            'useTLS' => env('PUSHER_SCHEME', 'https') === 'https', // Verifica si estás usando TLS
        ],
    ],

    /*
    |-------------------------------------
    | User Avatar
    |-------------------------------------
    */
    'user_avatar' => [
        'folder' => 'users-avatar',
        'default' => 'avatar.png',
    ],

    /*
    |-------------------------------------
    | Gravatar
    |
    | imageset property options:
    | [ 404 | mp | identicon (default) | monsterid | wavatar ]
    |-------------------------------------
    */
    'gravatar' => [
        'enabled' => true,
        'image_size' => 200,
        'imageset' => 'identicon'
    ],

    /*
    |-------------------------------------
    | Attachments
    |-------------------------------------
    */
    'attachments' => [
        'folder' => 'attachments',
        'download_route_name' => 'attachments.download',
        'allowed_images' => (array) ['png','jpg','jpeg','gif'],
        'allowed_files' => (array) ['zip','rar','txt'],
        'max_upload_size' => env('CHATIFY_MAX_FILE_SIZE', 150), // MB
    ],

    /*
    |-------------------------------------
    | Messenger's colors
    |-------------------------------------
    */
    'colors' => (array) [
        '#2180f3',
        '#2196F3',
        '#00BCD4',
        '#3F51B5',
        '#673AB7',
        '#4CAF50',
        '#FFC107',
        '#FF9800',
        '#ff2522',
        '#9C27B0',
    ],
    /*
    |-------------------------------------
    | Sounds
    | You can enable/disable the sounds and
    | change sound's name/path placed at
    | `public/` directory of your app.
    |
    |-------------------------------------
    */
    'sounds' => [
        'enabled' => true,
        'public_path' => 'sounds/chatify',
        'new_message' => 'new-message-sound.mp3',
    ]
];
