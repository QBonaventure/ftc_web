<?php
namespace FTC\PageReaper;

use FTC\PageReaper\Exception\LoaderException;

class Loader
{
    
    /**
     * @var Explorer
     */
    private $explorer;
    
    public function __construct(Explorer $explorer)
    {
        $this->explorer = $explorer;
    }
    
    public function loadFromFile($group, $filename) : Page
    {
        $filepath = $this->explorer->getFilePath($group, $filename);
        
        if (!file_exists($filepath)) {
            LoaderException::fileNotFound($filename);
        }
        
        $content = file_get_contents($filepath);

        return new Page($content);
    }
    
}
