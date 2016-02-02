<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'HoQUSMuvSnIYL2H3ofN2kGJgEATwUkbT',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
    		'enablePrettyUrl' => true, 
    		'enableStrictParsing' => false,
    		'showScriptName' => false,
    		'rules' => [
                    [
                        'class' => 'yii\rest\UrlRule',
                        'controller' => 'fabricante',
                        'pluralize' => false,
                    ],
                    [
                        'class' => 'yii\rest\UrlRule',
                        'controller' => 'api',
                        'tokens' => [
                                    '{id}' => '<id:\\d[\\d,]*>', 
                                    '{name}' => '<name:\\w[\\w,]*>',
                        ],
                        'patterns' => [
                            'GET' => 'index',
                            'GET search/{id}/{name}' => 'search',
                            'POST soma' => 'soma',
                            'GET test/{id}' => 'test-rest',
                            'GET estados' => 'estados',
                            'GET estado/{id}' => 'estado',
                            'POST estado' => 'create-estado',
                        ],
                    ],
    		],
	],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
