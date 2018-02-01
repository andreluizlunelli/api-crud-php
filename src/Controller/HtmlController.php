<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 31/01/2018
 * Time: 20:35
 */

namespace Andre\Controller;

use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

class HtmlController extends Controller
{
    /**
     * @var Twig
     */
    private $view;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->view = $container->get('view');
    }

    public function home(Request $request, Response $response, array $args)
    {
        return $this->view->render($response, 'home.twig', $args);
    }

    public function userRegister(Request $request, Response $response, array $args)
    {
        return $this->view->render($response, 'userRegister.twig', $args);
    }

}