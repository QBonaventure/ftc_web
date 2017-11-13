<?php

return [
    'dependencies' => [
        'factories' => [
            \Zend\Expressive\Application::class => \Zend\Expressive\Container\ApplicationFactory::class,
            \FTC\Container\View\Helper\MainMenu::class => \FTC\Container\View\Helper\MainMenuFactory::class,
        ],
        'invokables' => [
            MarkDownParser::class => FTC\PageReaper\ParseDownExtension::class,
        ],
        'delegators' => [
            \Zend\Expressive\Application::class => [
                FTC\Container\PipelineAndRoutesDelegator::class,
            ],
        ],
    ],
];
