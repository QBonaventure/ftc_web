<?php
namespace FTC\Container\PageReaper\Middleware;

use FTC\PageReaper;
use Psr\Container\ContainerInterface;
use FTC\PageReaper\Middleware\Reaper;

class ReaperFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $reaper = $container->get(PageReaper::class);
        return new Reaper($reaper);
    }
}