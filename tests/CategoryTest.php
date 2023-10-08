<?php

namespace Tests;

use GuzzleHttp\Client;
use Osteel\OpenApi\Testing\ValidatorBuilder;
use Osteel\OpenApi\Testing\ValidatorInterface;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    private Client $client;
    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->client = ClientFactory::client();
    }

    private function validator(): ValidatorInterface
    {
        return ValidatorBuilder::fromYamlFile(__DIR__ . '/../openapi.yaml')
            ->getValidator();
    }

    public function testGetCategoryById(): void
    {
        /**
         * Мечтаю тоже сделать только ассерт, как в методе ниже, но теряется читаемость если не знаешь контекста.
         */
        $response = $this->client->get('/category/1');
        $this->assertTrue(
            $this->validator()
                ->validate($response, 'category/1', 'get')
        );
    }

    public function testGetCategoryAll(): void
    {
        $this->assertTrue(
            $this->validator()
                ->validate(
                    $this->client->get('/category/all'),
                    'category/all',
                    'get'
                )
        );
    }
}
