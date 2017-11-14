<?php

namespace FTC\Container;

use App\Action;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Application;
use FTC\PageReaper\Middleware\Reaper;
use FTC\Middleware\RouteObserver;
use Zend\Expressive\Helper\ServerUrlMiddleware;

class PipelineAndRoutesDelegator
{
    /**
     * @param ContainerInterface $container
     * @param string $serviceName Name of the service being created.
     * @param callable $callback Creates and returns the service.
     * @return Application
     */
    public function __invoke(ContainerInterface $container, $serviceName, callable $callback)
    {
        /** @var $app Application */
        $app = $callback();
        
        // Setup pipeline:
//         $app->pipe(ErrorHandler::class);
//         $app->pipe(ServerUrlMiddleware::class);
        $app->pipe(ServerUrlMiddleware::class);
        $app->pipeRoutingMiddleware();
//         $app->pipe(ImplicitHeadMiddleware::class);
//         $app->pipe(ImplicitOptionsMiddleware::class);
//         $app->pipe(UrlHelperMiddleware::class);
        $app->pipe(RouteObserver::class);
        $app->pipe(Reaper::class);
        $app->pipeDispatchMiddleware();
//         $app->pipe(NotFoundHandler::class);
        
        // Setup routes:
//         $app->get('/', Action\HomePageAction::class, 'home');
//         $app->get('/api/ping', Action\PingAction::class, 'api.ping');
//         $app->get('/h%C3%%A9ros/{hero_identifier}', \FTC\Action\Hero::class, 'heroPage');
        $app->get('/hero/{page}', \FTC\Action\Hero::class, 'heroPage');
        $app->get('/bpm/{page}', \FTC\Action\Hero::class, 'bpmPage');
        
        return $app;
    }
}
