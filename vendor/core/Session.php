<?php


namespace vendor\core;


class Session {

    static $totalCount = 0;
    static $totalPrice = 0;

    public static function sessionInit($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function getValue($key)
    {
        if(!empty($_SESSION[$key]))
            return $_SESSION[$key];
    }

    public static function sessionRemove($key)
    {
        unset($_SESSION[$key]);
    }
} 