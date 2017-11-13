<?php
namespace FTC\Container\Action;

use Psr\Container\ContainerInterface;
use FTC\Action\Hero;
use Zend\Expressive\Template\TemplateRendererInterface;

class HeroFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $template = $container->get(TemplateRendererInterface::class);

        return new Hero($template);
    }
}