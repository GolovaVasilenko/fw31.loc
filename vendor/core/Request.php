<?php

namespace vendor\core;


class Request
{
    protected function array_get($array, $key, $default = null)
    {
        if(!$key)
            return $default;
        return isset($array[$key]) ? $array[$key] : $default;
    }

    public function post($key, $default = null)
    {
        return $this->array_get($_POST, $key, $default);
    }

    public function get($key, $default = null)
    {
        return $this->array_get($_GET, $key, $default);
    }

    public function server($key, $default = null)
    {
        return $this->array_get($_SERVER, $key, $default);
    }

    public function file($key, $name = null, $default = [])
    {
        if(!empty($name) && !empty($_FILES[$key][$name]))
            return $_FILES[$key][$name];
        elseif(empty($name) && !empty($_FILES[$key]))
            return $_FILES[$key];
        else
            return $default;
    }

    public function ispost(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){
            return $_POST;
        }
        return [];
    }
} 