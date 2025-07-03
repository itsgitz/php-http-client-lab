<?php

namespace WithGuzzleHttp\MinIOApiWrapper\Response;

abstract class BaseResponse
{
    public static function fromArray(array $data, string $class): static
    {
        $object = new $class();
        foreach ($data as $key => $value) {
            if (property_exists($object, $key)) {
                $object->$key = $value;
            }
        }
        return $object;
    }
}
