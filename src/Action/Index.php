<?php 
namespace FTC\Action;

use Zend\Diactoros\Response\HtmlResponse;

class Index 
{
    
    private $reaper;
    
    public function __construct($reaper)
    {
        $this->reaper = $reaper;
    }
    
    public function __invoke($request, $response, $next)
    {
        $page = $this->reaper->reap('/var/www/ftc_wiki/ftc_wiki/data/pages/hots/heros/li_ming.txt');
        
        $html = $this->reaper->convert($page);
        return new HtmlResponse($html);
    }
    
}
