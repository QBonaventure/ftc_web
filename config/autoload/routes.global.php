<?php

return [
    'dependencies' => [
        'invokables' => [
//             API\Action\PingAction::class => API\Action\PingAction::class,
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\FastRouteRouter::class,
        ],
        'factories' => [
            FTC\Action\Index::class => FTC\Container\Action\IndexFactory::class,
            FTC\Action\Hero::class => FTC\Container\Action\HeroFactory::class,
            FTC\Action\Reaper::class => FTC\Container\Action\ReaperFactory::class,
            FTC\PageReaper\Middleware\Reaper::class => FTC\Container\PageReaper\Middleware\ReaperFactory::class,
            FTC\Middleware\RouteObserver::class => FTC\Container\Middleware\RouteObserverFactory::class,
        ]
    ],

//     'routes' => [
// //         [
// //             'name' => 'changePassword',
// //             'path' => '/connect/users/{identifier}/credentials',
// //             'middleware' => [
// //                 API\Action\AuthentifyAction::class,
// //                 API\Action\ResetPasswordAction::class,
// //              ],
// //             'allowed_methods' => ['PATCH'],
// //         ],
//     ],
    
//     'middleware_pipeline' => [
// //         'api' => [
// //             'middleware' => [
// //                 FTC\Action\Reaper::class
// //             ],
// //             'priority' => 110,
// //         ],
//     ],
];