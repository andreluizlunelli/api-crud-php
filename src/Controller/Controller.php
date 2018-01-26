<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 25/01/2018
 * Time: 21:48
 */

namespace Andre\Controller;

use Psr\Container\ContainerInterface;

class Controller
{

    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

}