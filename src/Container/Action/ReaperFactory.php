<?php
namespace FTC\Container\Action;

use FTC\PageReaper;
use Psr\Container\ContainerInterface;
use FTC\Action\Hero;

class ReaperFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $reaper = $container->get(PageReaper::class);
        return new Hero($reaper);
    }
}