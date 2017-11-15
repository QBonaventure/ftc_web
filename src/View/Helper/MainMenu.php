<?php
namespace FTC\View\Helper;


use Zend\View\Helper\AbstractHelper;
use FTC\PageReaper\Explorer;

class MainMenu extends AbstractHelper
{
    
    private $explorer;
    
    private $config;
    
    public function __construct(Explorer $explorer, $config)
    {
        $this->explorer = $explorer;
        $this->config = $config;
    }
    
    
    public function __invoke()
    {
        $paths = $this->explorer->getPaths();
        $filteredPaths = array_diff_key($paths, array_flip(['misc', 'media']));

        $filteredPaths = $this->sortPagesIndex($filteredPaths);
        
        $routesMapping = $this->config['groupsAndRoutesMapping'];
        $values = [
            'paths' => $filteredPaths,
            'routesMapping' => $routesMapping,
        ];
        
        return $this->getView()->partial('app::menu', $values);
    }
    
    private function sortPagesIndex($paths)
    {
        foreach ($paths as $group => $pages) {
            asort($paths[$group]);
        }
        
        return $paths;
    }
    
}
