<?php
namespace FTC\Container\PageReaper\Middleware;

use FTC\PageReaper;
use Psr\Container\ContainerInterface;
use FTC\PageReaper\Middleware\Reaper;
use FTC\PageReaper\Explorer;
use Zend\Expressive\Template\TemplateRendererInterface;

class ReaperFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $reaper = $container->get(PageReaper::class);
        $template = $container->get(TemplateRendererInterface::class);
        $config = $container->get('config')['reaper'];
        
        return new Reaper($reaper, $template, $config);
    }
}