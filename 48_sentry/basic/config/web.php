<?php

$params = require(__DIR__ . '/params.php');
$adminmenu = require(__DIR__. '/adminmenu.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'index',
    'language' => 'zh-cn',
    'charset' => 'utf-8',
    'components' => [
        'session' => [
            'class' => 'yii\redis\Session',
            'redis' => [
                'hostname' => 'localhost',
                'port' => 6379,
                'database' => '3'
            ],
            'keyPrefix' => 'imooc_sess_',
        ],
       'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'nodes' => [
                ['http_address' => '192.168.199.112:9200'],
                // configure more hosts if you have a cluster
            ],
        ], 
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            // auth_item (role permission)
            // auth_item_child (role->permission)
            // auth_assignment (user->role)
            // auth_rule (rule)
            'itemTable' => '{{%auth_item}}',
            'itemChildTable' => '{{%auth_item_child}}',
            'assignmentTable' => '{{%auth_assignment}}',
            'ruleTable' => '{{%auth_rule}}',
            'defaultRoles' => ['default'],
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js'
                    ],
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [
                        YII_ENV_DEV ? 'css/bootstrap.css' : 'css/bootstrap.min.css',
                    ]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'js/bootstrap.js' : 'js/bootstrap.min.js',
                    ]
                ]
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'q6ga0ArPuP1iWsey2H6aoeWsP7G98FnL',
        ],
        'cache' => [
            //'class' => 'yii\caching\FileCache',
            'class' => 'yii\redis\Cache',
            'redis' => [
                'hostname' => 'localhost',
                'port' => 6379,
                'database' => '2',
            ],
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'idParam' => '__user',
            'identityCookie' => ['name' => '__user_identity', 'httpOnly' => true],
            'loginUrl' => ['/member/auth'],
        ],
        'admin' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\modules\models\Admin',
            'idParam' => '__admin',
            'identityCookie' => ['name' => '__admin_identity', 'httpOnly' => true],
            'enableAutoLogin' => true,
            'loginUrl' => ['/admin/public/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'index/error',
        ],
        'mailer' => [
            //'class' => 'yii\swiftmailer\Mailer',
            'class' => 'doctorjason\mailerqueue\MailerQueue',
            'db' => '1',
            'key' => 'mails',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',
                'username' => 'imooc_shop@163.com',
                'password' => 'imooc123',
                'port' => '465',
                'encryption' => 'ssl',
            ],

        ],
        'sentry' => [
            'class' => 'mito\sentry\SentryComponent',
            'dsn' => 'https://b54b26f05efd42e8879e957cb7d76273:93014636f46a4620a40ca35155385e56@sentry.io/122995', // private DSN
            'publicDsn' => 'https://b54b26f05efd42e8879e957cb7d76273@sentry.io/122995',
            'environment' => YII_CONFIG_ENVIRONMENT, // if not set, the default is `development`
            'jsNotifier' => true, // to collect JS errors
            'clientOptions' => [ // raven-js config parameter
                'whitelistUrls' => [ // collect JS errors from these urls
                    //'http://staging.my-product.com',
                    //'https://my-product.com',
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'mito\sentry\SentryTarget',
                    'levels' => ['error', 'warning'],
                    'except' => [
                        'yii\web\HttpException:404',
                    ],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => '@app/runtime/logs/shop/application.log',
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info', 'trace'],
                    'logFile' => '@app/runtime/logs/shop/info.log',
                    'categories' => ['myinfo'],
                    'logVars' => [],
                ],
                /*[
                 'class' => 'yii\log\EmailTarget',
                 'mailer' =>'mailer',
                 'levels' => ['error', 'warning'],
                 'message' => [
                     'from' => ['imooc_shop@163.com'],
                     'to' => ['86267659@qq.com'],
                     'subject' => 'imooc_shop的日志',
                 ],
                ],*/
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules' => [
                '<controller:(index|cart|order)>' => '<controller>/index',
                'auth' => 'member/auth',
                'product-category-<cateid:\d+>' => 'product/index',
                'product-<productid:\d+>' => 'product/detail',
                'order-check-<orderid:\d+>' => 'order/check',
                [
                    'pattern' => 'imoocback',
                    'route' => '/admin/default/index',
                    'suffix' => '.html',
                ],
            ],
        ],
        
    ],
    'params' => array_merge($params, ['adminmenu' => $adminmenu]),
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['192.168.199.108'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1'],
    ];
}

$config['modules']['admin'] = [
    'class' => 'app\modules\admin',
];
return $config;
