<?php

return [
    'dependencies' => [
        'factories' => [
            \FTC\PageReaper::class => FTC\Container\PageReaperFactory::class,
            \FTC\PageReaper\Explorer::class => FTC\Container\PageReaper\ExplorerFactory::class,
            \FTC\PageReaper\Loader::class => FTC\Container\PageReaper\LoaderFactory::class,
        ],
        'invokables' => [
        ],
    ],
];
