<?php
namespace FTC\PageReaper\Middleware;

use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;

class Reaper implements MiddlewareInterface
{
    
    private $routesToBeReaped = [
        'heroPage' => '/var/www/ftc_wiki/ftc_wiki/data/pages/hots/heros/%s.txt'
    ];
    
    private $reaper;
    
    public function __construct($reaper)
    {
        $this->reaper = $reaper;
    }
    
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $routeName = $request->getAttribute('routeName');

        if (key_exists($routeName, $this->routesToBeReaped)) {
            $pagePath = sprintf($this->routesToBeReaped[$routeName], $request->getAttribute('page'));
            $page = $this->reaper->reap($pagePath);

            $html = $this->reaper->convert($page);
            $request = $request->withAttribute(self::class, $html);
        }

        return $delegate->process($request);
    }
}
