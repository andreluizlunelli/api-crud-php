<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 31/01/2018
 * Time: 20:35
 */

namespace Andre\Controller;

use Andre\Model\Entity\Person;
use Doctrine\ORM\EntityManager;
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

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->view = $container->get('view');
        $this->em = $container->get('em');
    }

    public function home(Request $request, Response $response, array $args)
    {
        if (empty($request->getQueryParams()))
            $args['persons'] = $this->em->getRepository(Person::class)->findAll();
        else
            $args['persons'] = $this->em->getRepository(Person::class)->filter($request->getQueryParams());

        return $this->view->render($response, 'home.twig', $args);
    }

    public function userRegister(Request $request, Response $response, array $args)
    {
        return $this->view->render($response, 'userRegister.twig', $args);
    }

}