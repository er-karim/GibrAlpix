<?php

namespace App\Core;

/**
 * App class file
 *
 * @package App\Core
 * @author ERRAK Karim <errakkarim@gmail.com>
 */
class App
{
    protected static $items = [];

    /**
     * fill items array
     * @param  string $key
     * @param  mixed $value
     * @return void
     */
    public static function bind($key, $value)
    {
        static::$items[$key] = $value;
    }

    /**
     * get value by key
     * @param  string $key
     * @return mixed
     */
    public static function get($key)
    {
        if (array_key_exists($key, static::$items)) {
            return static::$items[$key];
        }

        throw new Exception("Error {$key} key doesn't exist.");
    }
}
