<?php

require __DIR__ . '/vendor/autoload.php';

use WithGuzzleHttp\MinIOApiWrapper\ApiClient as ApiClient;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$baseUrl = $_ENV['MINIO_API_WRAPPER_BASE_URL'];
$username = $_ENV['MINIO_API_USERNAME'];
$password = $_ENV['MINIO_API_PASSWORD'];

$client = new ApiClient($baseUrl, $username, $password);

$health = $client->health();

echo $health->message;
