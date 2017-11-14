<?php
namespace FTC\Container;

use FTC\PageReaper;
use Psr\Container\ContainerInterface;
use FTC\PageReaper\Loader;
use FTC\PageReaper\Explorer;


class PageReaperFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $parser = $container->get(\MarkDownParser::class);
        $loader = $container->get(Loader::class);
        $explorer = $container->get(Explorer::class);
        
        return new PageReaper($parser, $loader, $explorer);
    }
}
