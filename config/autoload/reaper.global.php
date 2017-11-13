<?php

return [
    'dependencies' => [
        'factories' => [
            \FTC\PageReaper::class => FTC\Container\PageReaperFactory::class,
        ],
        'invokables' => [
            \FTC\PageReaper\Loader::class,
        ],
    ],
];
