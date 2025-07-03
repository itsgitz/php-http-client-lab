<?php

require __DIR__ . '/vendor/autoload.php';

use WithGuzzleHttp\MinIOApiWrapper\ApiClient as ApiClient;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

var_dump($_ENV);

//$client = new ApiClient('', '', '');
