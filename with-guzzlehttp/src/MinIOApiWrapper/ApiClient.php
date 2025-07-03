<?php

namespace WithGuzzleHttp\MinIOApiWrapper;

use GuzzleHttp\Client;

class ApiClient
{
    protected Client $client;

    public function __construct(string $baseUrl, string $username, string $password)
    {
        $this->client = new Client(
            [
            'base_uri' => $baseUrl,
            'auth' => [$username, $password],
            ]
        );
    } 

    public function health()
    {
        $response = $this->client->get('/health');

        return json_decode($response->getBody()->getContents(), true);
    }
}

