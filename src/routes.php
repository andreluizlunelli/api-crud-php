<?php

use Andre\Controller\PersonController;
use Andre\Middleware\UFMiddleware;

$app->group('/api/person', function () {
    $this->get('', PersonController::class.':get');
    $this->post('/{uf}', PersonController::class.':post')->add(new UFMiddleware());
    $this->get('/{id}', PersonController::class.':getOne');
    $this->put('/{uf}/{id}', PersonController::class.':put');
    $this->delete('/{id}', PersonController::class.':delete');
});
