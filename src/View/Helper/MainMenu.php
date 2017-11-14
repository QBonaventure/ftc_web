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
        return $this->getView()->partial('app::menu');
        return('zzzzzzzzzz');
        return $this->explorer->getPaths();
    }
    
    
}
