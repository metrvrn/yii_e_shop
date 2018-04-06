<?php

return [
    'adminEmail' => 'admin@example.com',
    'ftpClient' => [
        'configs' => [
            'default' => [
                'user' => 'h612012230_clnt',
                'pass' => '786Qaz!@',
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
    'catalogUploader' => [
        'downloadUrl' => '/catalog_unload/',
        'tmpFolder' => '../runtime/catalogFiles/'
    ],
    'mailingList' => [
        'mr0094@gmail.com'
    ]
];
