<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
             'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    /*'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',*/
                    'clientId' => '1539227622879558',
                    'clientSecret' => 'f87b542b2b82dd3376d63dce1b8accb3',
                ],
                'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '133271553044-l9gicqk8a0hgveuu2qoesr4pn3eimmqb.apps.googleusercontent.com',
                    'clientSecret' => 'tmYn69lTbEbT4KrvUgOEl38J',
                   /* 'returnUrl' => 'http://localhost/TQD/site/auth?authclient=google'*/
                ],
            ],
        ],
    ],

           
];
