<?php

use Andre\Controller\Api\PersonController;
use Andre\Controller\HtmlController;
use Andre\Middleware\UFMiddleware;

$app->group('/', function () {
    $this->get('', HtmlController::class.':home')->setName('home');
    $this->get('user-register', HtmlController::class.':userRegister')->setName('userRegister');
});

// api
$app->group('/api/person', function () {
    $this->get('', PersonController::class.':get');
    $this->post('/{uf}', PersonController::class.':post')->add(new UFMiddleware());
    $this->get('/{id}', PersonController::class.':getOne');
    $this->put('/{uf}/{id}', PersonController::class.':put');
    $this->delete('/{id}', PersonController::class.':delete');
});
