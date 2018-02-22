<?php

return [
    'adminEmail' => 'admin@example.com',
    'ftpClient' => [
        'configs' => [
            'default' => [
                'user' => '',
                'pass' => '',
                'host' => 'metropt.ru'
            ],
            'dev' => [
                'user' => 'yii',
                'pass' => '3232',
                'host' => '127.0.0.1'
            ],
        ],
        'usedConfig' => 'dev'
    ],
    'metrCatalogGetter' => [
        'downloadUrl' => '/catalog_unload/',
        'tmpFolder' => '../runtime/catalogFiles/'
    ]
];
