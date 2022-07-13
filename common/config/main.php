<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'RU',
    'timeZone' => 'Asia/Novosibirsk',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
       /* 'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/auth/signup' => 'auth/auth-view/signup', //модуль статистики
            ],
            /*'showScriptName' => false, //отключаем r=routes
            'enableStrictParsing' => true, //запретить стандартные URL если не соответствуют правилам
            'enablePrettyUrl' => true, //отключаем index.php
            'rules' => [
                '/' => 'site/index',
                '/autor' => 'autor/index',
                '/login' => 'site/login',
                'statistics/' => 'statistics/stat/index', //модуль статистики
            ],
        ],*/
    ],

];
