<?php
namespace FTC\Container\View\Helper;

use Psr\Container\ContainerInterface;
use FTC\View\Helper\MainMenu;
use FTC\PageReaper\Explorer;

class MainMenuFactory
{
    
    public function __invoke(ContainerInterface $container)
    {
        $explorer = $container->get(Explorer::class);
        $config = $container->get('config')['reaper'];
        
        return new MainMenu($explorer, $config);
    }
    
}
