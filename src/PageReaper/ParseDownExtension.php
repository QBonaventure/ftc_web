<?php

namespace FTC\PageReaper;

class ParseDownExtension extends \Parsedown
{
    
    function __construct()
    {
        $this->InlineTypes['&'][] = 'ColoredTag';
        $this->InlineTypes['&'][] = 'Blahd';
    }
    
    private $coloredTextRegex = '#&lt;color\s\#(.{6,6})&gt;(.*)&lt;/color&gt;#';
    
    private $coloredTextCssClass = [
        '22b14c' => 'green',
        '00a2e8' => 'blue'
    ];
    
    protected function inlineBlahd($excerpt)
    {
        if (preg_match('#{{page&gt;(.*)}}#', $excerpt['context'], $matches)) {
            var_dump($excerpt);
        }
    }
    
    protected function inlineColoredTag($excerpt)
    {
        if (preg_match($this->coloredTextRegex, $excerpt['text'], $matches)) {
            $text = $matches[2];
            $extent = strlen($matches[0]);
            $class =  $this->coloredTextCssClass[$matches[1]];
            $element = [
                'name' => 'span',
                'handler' => 'line',
                'text' => $text,
                'attributes' => [
                    'class' => $class,
                ],
            ];
            return [
                'extent' => $extent,
                'element' => $element,
            ];
        }
    }    
}
