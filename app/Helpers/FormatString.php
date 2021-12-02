<?php

namespace App\Helpers;

class FormatString
{
    public static function serialize_uri($uri): array|string
    {
        return str_replace('\/', '/', $uri);
    }
    public static function serialize_method($method): array|string
    {
        return str_replace('|HEAD', '', $method);
    }
    public static function serialize_middleware($middleware): array|string
    {
        $str = implode(' | ', $middleware);
        return preg_replace('/\\\\/', '\\', $str);
    }

    /**
     * @throws \JsonException
     */
    public static function serialize_params($params): array|string
    {
        if (is_string($params)) {
            return $params;
        }
        return count($params) > 0 ? json_encode($params, JSON_THROW_ON_ERROR) : "null";
    }
}
