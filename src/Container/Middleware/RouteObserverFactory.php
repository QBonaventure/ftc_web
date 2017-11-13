<?php
namespace FTC\Container\Middleware;

use Psr\Container\ContainerInterface;
use FTC\Middleware\RouteObserver;
use Zend\Expressive\Router\RouteResult;
use Zend\Expressive\Router\RouterInterface;

class RouteObserverFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new RouteObserver();
    }
}
