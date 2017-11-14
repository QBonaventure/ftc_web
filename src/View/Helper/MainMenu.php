<?php
namespace FTC\View\Helper;


use Zend\View\Helper\AbstractHelper;
use FTC\PageReaper\Explorer;

class MainMenu extends AbstractHelper
{
    
    private $explorer;
    
    public function __construct(Explorer $explorer)
    {
        $this->explorer = $explorer;
    }
    
    
    public function __invoke()
    {
        $paths = $this->explorer->getPaths();
        $filteredPaths = array_diff_key($paths, array_flip(['misc', 'media']));
        return $this->getView()->partial('app::menu', ['paths' => $filteredPaths]);
    }
    
    
}
