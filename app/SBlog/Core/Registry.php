<?php
/**
 * Created by PhpStorm.
 * User: Rostov
 * Date: 21.10.2019
 * Time: 15:14
 */

namespace App\SBlog\Core;


class Registry
{
    use TSingletone;

    protected static $properties = [];

    public function setProperty($name, $value) {
        self::$properties[$name] = $value;
    }
    public function getProperty($name) {
        if(self::$properties[$name]) {
            return self::$properties[$name];
        }
        return null;
    }
    public function getProperties() {
        return self::$properties;
    }

}
