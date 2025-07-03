<?php 

namespace WithGuzzleHttp\MinIOApiWrapper\Response;

use Exception;

class MinioApiException extends Exception
{
    public int $statusCode;
    public ?array $responseBody;

    public function __construct(string $message, int $statusCode = 0, ?array $responseBody = null)
    {
        parent::__construct($message, $statusCode);
        $this->statusCode = $statusCode;
        $this->responseBody = $responseBody;
    }
}
