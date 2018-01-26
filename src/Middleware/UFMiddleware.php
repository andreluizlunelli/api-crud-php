<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 25/01/2018
 * Time: 22:19
 */

namespace Andre\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class UFMiddleware
{

    public function __invoke(Request $request, Response $response, callable $next)
    {
        $uf = $request->getAttribute('route')->getArgument('uf');

        if (empty($uf))
            throw new \RuntimeException('UF não pode ser vazio');

        $uf = strtolower($uf);

        if ($uf != 'sc' && $uf != 'pr')
            throw new \RuntimeException('UF não suportada');

        $response = $next($request, $response);

        return $response;
    }

}