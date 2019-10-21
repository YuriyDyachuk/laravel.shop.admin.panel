<?php
/**
 * Created by PhpStorm.
 * User: Rostov
 * Date: 21.10.2019
 * Time: 15:19
 */

namespace App\SBlog\Core;


class BlogApp
{
    public static $app;
    public static function get_instance() {
        self::$app = Registry::instance();
        self::getParams();
        return self::$app;
    }
    protected static function getParams() {
        $params = require CONF . '/params.php';

        if (!empty($params)) {
            foreach($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }

}
