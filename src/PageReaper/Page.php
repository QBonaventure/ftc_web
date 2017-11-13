<?php
namespace FTC\PageReaper;

class Page
{
    
    private $markdownText;
    
    public function __construct($text)
    {
        $this->markdownText = $text;
    }
    
    public function getMardownText()
    {
        return $this->markdownText;
    }
}
