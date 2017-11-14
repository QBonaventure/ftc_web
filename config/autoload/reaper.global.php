<?php

return [
    'reaper' => [
        'wikiBasePath' => '/wiki/data',
        'discriminators' => [
            '/media_attic/' => 'media',
            '/pages/hots/heros' => 'heroes',
            '/pages/hots/maps' => 'maps',
            '/pages/hots/sticky_notes' => 'sticky_notes',
            '/pages/hots/bpm' => 'bpm',
        ]
    ],
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
