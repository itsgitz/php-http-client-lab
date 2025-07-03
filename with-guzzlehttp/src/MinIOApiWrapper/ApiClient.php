<?php

namespace WithGuzzleHttp\MinIOApiWrapper;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use WithGuzzleHttp\MinIOApiWrapper\Response\HealthResponse;
use WithGuzzleHttp\MinIOApiWrapper\Response\HealthResponseLaravel;
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

            if ($response->getStatusCode() >= 400) {
                throw new MinioApiException('Error', $response->getStatusCode(), $data);
            }

            return HealthResponse::fromArray($data, HealthResponse::class);
        } catch (GuzzleException $e) {
            throw new MinioApiException('Reqeust failed:' . $e->getMessage(), 500);
        }
    }

    public function healthLaravel(): HealthResponseLaravel
    {
        $response = $this->client->get('/v1/health');
        $data = json_decode($response->getBody()->getContents(), true);
        if ($response->getStatusCode() >= 404) {
            throw new MinioApiException('Health check failed', $response->getStatusCode(), $data);
        }

        return HealthResponseLaravel::from($data);
    }
}
