<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'modules' => [
        'user-management' => [
            'class' => 'webvimark\modules\UserManagement\UserManagementModule',
            // Here you can set your handler to change layout for any controller or action
            // Tip: you can use this event in any module
            'on beforeAction' => function (\yii\base\ActionEvent $event) {
                if ($event->action->uniqueId == 'user-management/auth/login') {
                    $event->action->controller->layout = 'loginLayout.php';
                };
            },
        ],
    ],
];
