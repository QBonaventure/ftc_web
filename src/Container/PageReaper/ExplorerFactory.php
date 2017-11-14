<?php
namespace FTC\Container\PageReaper;


use Psr\Container\ContainerInterface;
use FTC\PageReaper\Explorer;

class ExplorerFactory
{
    
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config')['reaper'];
        
        if (!isset($config['wikiBasePath'])) {
            throw new \Exception();
        }
        
        return new Explorer($config);
    }
    
}
