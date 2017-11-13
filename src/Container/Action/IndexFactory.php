<?php
namespace FTC\Container\Action;

use FTC\Action\Index;
use FTC\PageReaper;
use Psr\Container\ContainerInterface;

class IndexFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $reaper = $container->get(PageReaper::class);
        return new Index($reaper);
    }
}