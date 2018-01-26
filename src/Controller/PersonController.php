<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 25/01/2018
 * Time: 21:50
 */

namespace Andre\Controller;

use Andre\Model\Entity\Person;
use Andre\Model\Hydrator\PersonHydrator;
use Andre\Model\PersonService;
use Andre\Model\UF\UFFactory;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class PersonController extends Controller
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->em = $container->get('em');
    }

    public function get(Request $request, Response $response, array $args)
    {
        return $response->withJson($this->em->getRepository(Person::class)->findAll());
    }

    public function getOne(Request $request, Response $response, array $args)
    {
        $id = $request->getAttribute('id');
        return $response->withJson($this->em->getRepository(Person::class)->find($id));
    }

    public function post(Request $request, Response $response, array $args)
    {
        if (strlen((string) $request->getBody()) < 1)
            throw new \InvalidArgumentException('Corpo da requisição vazio');

        $body = json_decode((string)$request->getBody(), true);

        $person = PersonHydrator::parseFromJson($body);

        $rule = UFFactory::createUFBehavior($request->getAttribute('uf'));

        $ps = new PersonService($rule, $this->em);

        $ps->put($person);

        return $response
            ->withStatus(201)
            ->withHeader('location', '/api/person/'.$person->getId());
    }

}