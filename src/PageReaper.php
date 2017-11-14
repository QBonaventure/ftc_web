<?php

namespace FTC;

use FTC\PageReaper\Page;
use FTC\PageReaper\Loader;
use FTC\PageReaper\Explorer;

class PageReaper
{
    
    private $parser;
    
    /**
     * @var Loader 
     */
    private $loader;
    
    /**
     * @var Explorer
     */
    private $explorer;
    
    public function __construct($parser, Loader $loader, $explorer)
    {
        $this->parser = $parser;
        $this->loader = $loader;
        $this->explorer = $explorer;
    }
    
    public function getPaths()
    {
        return $this->explorer->getPaths();
    }
    
    public function reap($group, $filename)
    {
        return $this->loader->loadFromFile($group, $filename);
    }
    
    public function convert(Page $page)
    {
        return $this->parser->parse(htmlentities($page->getMardownText()));
    }
    
}
