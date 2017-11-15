<?php 
namespace FTC\Action;

use Zend\Diactoros\Response\HtmlResponse;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class Hero implements MiddlewareInterface
{
    
    private $routes = [
        'dfdf'
    ];
    
    /**
     * @var TemplateRendererInterface
     */
    private $template;
    
    public function __construct(TemplateRendererInterface $template)
    {
        $this->template = $template;
    }
    
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $page = $request->getAttribute('FTC\PageReaper\Middleware\Reaper');
        
        
        return new HtmlResponse($this->template->render('page::hero',['page' => $page]));

        $wikiPage = $delegate->process($request);
        return $wikiPage;
    }
    
}
