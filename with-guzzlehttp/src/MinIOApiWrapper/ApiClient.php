<?php

namespace WithGuzzleHttp\MinIOApiWrapper;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use WithGuzzleHttp\MinIOApiWrapper\Response\HealthResponse;
use WithGuzzleHttp\MinIOApiWrapper\Response\MinioApiException;

class ApiClient
{
    protected client $client;

    public function __construct(string $baseurl, string $username, string $password)
    {
        $this->client = new client(
            [
            'base_uri' => $baseurl,
            'auth' => [$username, $password],
            'http_errors' => false
            ]
        );
    }

    public function health(): HealthResponse
    {
        try {
            $response = $this->client->get('/v1/health');
            $data = json_decode($response->getbody()->getcontents(), true);

            $health = new HealthResponse();
            $health->message = $data['message'] ?? '';
            $health->alias = $data['alias'] ?? '';

            return $health;
        } catch (GuzzleException $e) {
            throw new MinioApiException('Reqeust failed:' . $e->getMessage(), 500);
        }
    }
}
