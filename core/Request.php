<?php

namespace App\Core;

/**
 * App requests class file
 *
 * @package App\Core
 * @author ERRAK Karim <errakkarim@gmail.com>
 */
class Request
{
    /**
     * get current uri
     * @param  string $folder_name
     * @return string
     */
    public static function uri($folder_name)
    {
        return str_replace($folder_name, '', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
    }

    /**
     * get the request type
     * @return string
     */
    public static function type()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
