<?php
/**
 * Created by PhpStorm.
 * User: Rostov
 * Date: 21.10.2019
 * Time: 15:11
 */

namespace App\SBlog\Core;


trait TSingletone
{   private static $instance;
    public static function instance() {
        if  (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }


}
