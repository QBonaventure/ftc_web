<?php
namespace FTC\Container\PageReaper;

use Psr\Container\ContainerInterface;
use FTC\PageReaper\Explorer;
use FTC\PageReaper\Loader;

class LoaderFactory
{
    
    public function __invoke(ContainerInterface $container)
    {
        $explorer = $container->get(Explorer::class);
        
        return new Loader($explorer);
    }
    
}
