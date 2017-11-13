<?php
namespace FTC\Container\View\Helper;

use Psr\Container\ContainerInterface;
use FTC\View\Helper\MainMenu;

class MainMenuFactory
{
    
    public function __invoke(ContainerInterface $container)
    {
        return new MainMenu();
    }
    
}
