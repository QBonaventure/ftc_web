<?php
namespace FTC\PageReaper\Middleware;

use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use FTC\PageReaper;
use Zend\Expressive\Template\TemplateRendererInterface;

class Reaper implements MiddlewareInterface
{
    
    private $routesToBeReaped = [
        'heroPage' => 'heroes',
        'bpmPage' => 'bpm',
    ];
    
    private $template;
    
    /**
     * @var PageReaper
     */
    private $reaper;
    
    public function __construct($reaper, TemplateRendererInterface $template)
    {
        $this->reaper = $reaper;
        $this->template = $template;
    }
    
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $routeName = $request->getAttribute('routeName');
        
        if (array_key_exists($routeName, $this->routesToBeReaped)) {
            $fileName =  explode('.', $request->getAttribute('page'))[0];
            $page = $this->reaper->reap($this->routesToBeReaped[$routeName], $fileName);

            $html = $this->reaper->convert($page);
            $request = $request->withAttribute(self::class, $html);
        }
        
        return $delegate->process($request);
    }
}
