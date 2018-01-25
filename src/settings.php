<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        'doctrine' => [
            'dev_mode' => true
            , 'entity_path' => [
                'src/Model/Entity'
            ],
            'driver' => 'pdo_pgsql',
            'host' => 'localhost',
            'dbname' => 'apicrudphp',
            'user' => 'postgres',
            'password' => 'postgres'
        ]
    ],
];
