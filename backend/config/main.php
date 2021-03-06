<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/admin',
            'cookieValidationKey' => $params['cookieValidationKey'],
        ],
        'user' => [
            'identityClass' => \common\auth\Identity::class,
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-pr-new', 'httpOnly' => true],
            //'identityCookie' => ['name' => '_identity', 'httpOnly' => true, 'domain' => $params['cookieDomain']],
        ],
        'session' => [
            'name' => 'pr-new-ses',
            'cookieParams' =>[
                'httpOnly' => true,
                //'domain' => $params['cookieDomain'],
            ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                '/login' => 'site/login',
                '/statistica' => 'statistica/statistic/index', //модуль статистики
            ],
        ],
        'univirsalFunctions' => [
            'class' => 'common\components\UnivirsalFunctions',
        ],

    ],
    'modules' => [
        'statistica' => [
            'class' => 'backend\modules\statistics\StatsticModule',
        ],
    ],
    'params' => $params,
];
