<?php

namespace FTC;

use FTC\PageReaper\Page;
use FTC\PageReaper\Loader;

class PageReaper
{
    
    private $parser;
    
    /**
     * @var Loader 
     */
    private $loader;
    
    public function __construct($parser, Loader $loader)
    {
        $this->parser = $parser;
        $this->loader = $loader;
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
