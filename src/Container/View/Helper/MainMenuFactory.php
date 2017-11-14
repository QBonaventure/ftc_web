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
        
        return new MainMenu($explorer);
    }
    
}
