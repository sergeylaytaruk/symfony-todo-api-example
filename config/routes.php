<?php

use App\Controller\CategoryController;
use App\Controller\ItemController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes): void {
    $routes->add('category_all', '/category/all')
        ->controller([CategoryController::class, 'list'])
        ->methods(['GET']);
    $routes->add('category_item', '/category/{id}')
        ->controller([CategoryController::class, 'show'])
        ->methods(['GET', 'HEAD']);
    $routes->add('category_add', '/category')
        ->controller([CategoryController::class, 'add'])
        ->methods(['POST']);
    $routes->add('category_update', '/category/{id}')
        ->controller([CategoryController::class, 'update'])
        ->methods(['PUT']);
    $routes->add('category_delete', '/category/{id}')
        ->controller([CategoryController::class, 'delete'])
        ->methods(['DELETE']);

    $routes->add('item_all', '/item/all')
        ->controller([ItemController::class, 'list'])
        ->methods(['GET']);
    $routes->add('item_item', '/item/{id}')
        ->controller([ItemController::class, 'show'])
        ->methods(['GET', 'HEAD']);
    $routes->add('item_add', '/item')
        ->controller([ItemController::class, 'add'])
        ->methods(['POST']);
    $routes->add('item_update', '/item/{id}')
        ->controller([ItemController::class, 'update'])
        ->methods(['PUT']);
    $routes->add('item_delete', '/item/{id}')
        ->controller([ItemController::class, 'delete'])
        ->methods(['DELETE']);
};
