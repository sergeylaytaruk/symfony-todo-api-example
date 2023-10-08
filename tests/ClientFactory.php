<?php

namespace Tests;

use GuzzleHttp\Client;

class ClientFactory
{
    public static function client(): Client
    {
        return new Client(
            [
                // Base URI is used with relative requests
                'base_uri' => 'http://myapi.docker',
                // You can set any number of default request options.
                'timeout' => 2.0,
            ]
        );
    }
}