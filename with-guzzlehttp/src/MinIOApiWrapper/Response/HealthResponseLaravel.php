<?php

namespace WithGuzzleHttp\MinIOApiWrapper\Response;

use Spatie\LaravelData\Data;

class HealthResponseLaravel extends Data
{
    public function __construct(
        public string $message,
        public string $alias
    ) {
    }
}
