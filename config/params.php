<?php

return [
    'adminEmail' => 'admin@example.com',
    'ftpClient' => [
        'configs' => [
            'default' => [
                'user' => 'h612012230_upload',
                'pass' => '786QWaszx',
                'host' => 'ftp.h612012230.nichost.ru'
            ],
            'dev' => [
                'user' => 'yii',
                'pass' => '3232',
                'host' => '127.0.0.1'
            ],
        ],
        'usedConfig' => 'default'
    ],
    'metrCatalogGetter' => [
        'downloadUrl' => '/catalog_unload/',
        'tmpFolder' => '../runtime/catalogFiles/'
    ]
];
