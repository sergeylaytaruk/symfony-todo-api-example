<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

/**
 * POST addCategory
 * Summary: Add a new category
 * Notes: Add a new category
 * Output-Formats: [application/json]
 */
$app->post('/category', function(Request $request, Response $response, array $args) {
    $response->getBody()->write('How about implementing addCategory as a POST method ?');
    return $response;
});

/**
 * DELETE deleteCategory
 * Summary: Deletes a category
 * Notes: delete a category
 * Output-Formats: [application/json]
 */
$app->delete('/category/{categotyId}', function(Request $request, Response $response, array $args) {
    $response->getBody()->write('How about implementing deleteCategory as a DELETE method ?');
    return $response;
});


/**
 * GET getCategoryById
 * Summary: Find category by ID
 * Notes: Returns a single item
 * Output-Formats: [application/json]
 */
$app->get('/category/{categotyId:[0-9]+}', function(Request $request, Response $response, array $args) {
    $categoryId = (int)$args['categotyId'];
    $json = json_encode(
        [
            'id' => $categoryId,
            'title' => 'test Title',
            'description' => 'test Description'
        ]
    );
    $response->getBody()->write($json);
    return $response->withAddedHeader('Content-Type', 'application/json');
});

/**
 * GET getAllCategories
 * Summary: All categories
 * Notes: Returns list of categories
 * Output-Formats: [application/json]
 */
$app->get('/category/all', function(Request $request, Response $response, array $args) {
    $json = json_encode([
        [
            'id' => 1,
            'title' => 'test Title 1',
            'description' => 'test Description 1'
        ],
        [
            'id' => 2,
            'title' => 'test Title 2',
            'description' => 'test Description 2'
        ],
    ]);
    $response->getBody()->write($json);
    return $response->withAddedHeader('Content-Type', 'application/json');
});

/**
 * PUT updateCategory
 * Summary: Update an exists category
 * Notes: Update an exists category
 * Output-Formats: [application/json]
 */
$app->put('/category', function(Request $request, Response $response, array $args) {
    $response->getBody()->write('How about implementing updateCategory as a PUT method ?');
    return $response;
});

/**
 * POST addItem
 * Summary: Add a new item
 * Notes: Add a new item
 * Output-Formats: [application/json]
 */
$app->post('/item', function(Request $request, Response $response, array $args) {

    $response->getBody()->write('How about implementing addItem as a POST method ?');
    return $response;
});


/**
 * DELETE deleteItem
 * Summary: Deletes a item
 * Notes: delete a item
 * Output-Formats: [application/json]
 */
$app->delete('/item/{itemId:[0-9]+}', function(Request $request, Response $response, array $args) {
    $response->getBody()->write('How about implementing deleteItem as a DELETE method ?');
    return $response;
});


/**
 * GET getAllItems
 * Summary: All items
 * Notes: Returns list of items
 * Output-Formats: [application/json]
 */
$app->get('/item/all', function(Request $request, Response $response, array $args) {
    $response->getBody()->write('How about implementing getAllItems as a GET method ?');
    return $response;
});


/**
 * GET getItemById
 * Summary: Find todo item by ID
 * Notes: Returns a single item
 * Output-Formats: [application/json]
 */
$app->get('/item/{itemId:[0-9]+}', function(Request $request, Response $response, array $args) {
    $response->getBody()->write('How about implementing getItemById as a GET method ?');
    return $response;
});


/**
 * GET getItemsByCategoryId
 * Summary: Find todo item by category ID
 * Notes: Returns list of items
 * Output-Formats: [application/json]
 */
$app->get('/item/foundByCategoryId/{categoryId:[0-9]+}', function(Request $request, Response $response, array $args) {
    $response->getBody()->write('How about implementing getItemsByCategoryId as a GET method ?');
    return $response;
});


/**
 * PUT updateItem
 * Summary: Update an exists item
 * Notes: Update an exists item
 * Output-Formats: [application/json]
 */
$app->put('/item', function(Request $request, Response $response, array $args) {
    $response->getBody()->write('How about implementing updateItem as a PUT method ?');
    return $response;
});


$app->run();

