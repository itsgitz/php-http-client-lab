<?php

namespace WithGuzzleHttp\MinIOApiWrapper\Response;

class HealthResponse extends BaseResponse
{
    public string $message;
    public string $alias;
}
