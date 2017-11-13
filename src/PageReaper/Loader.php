<?php
namespace FTC\PageReaper;

use FTC\PageReaper\Exception\LoaderException;

class Loader
{
    
    public function loadFromFile($filename) : Page
    {
        if (!file_exists($filename)) {
            LoaderException::fileNotFound($filename);
        }
        
        $content = file_get_contents($filename);

        return new Page($content);
    }
    
}
