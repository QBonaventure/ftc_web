<?php 
namespace FTC\Action;

use Zend\Diactoros\Response\HtmlResponse;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;

class Hero implements MiddlewareInterface
{
    
    private $reaper;
    
    public function __construct($reaper)
    {
        $this->reaper = $reaper;
    }
    
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        var_dump('REAPER');
        $page = $this->reaper->reap('/var/www/ftc_wiki/ftc_wiki/data/pages/hots/heros/li_li.txt');
        $html = $this->reaper->convert($page);
        
//         return $delegate->process($request);
        return new HtmlResponse($html);
    }
    
}
