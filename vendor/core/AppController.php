<?php

namespace vendor\core;


class AppController extends AbstractController
{
    public $request;
    protected $ctrl;
    protected $act;
    protected $param;
    protected $route = [];

    public function __construct($route = '')
    {
        $this->loadView();
        $this->request = new Request();
        $this->route = $route;
    }

    protected function unserializeData($str)
    {
        //title=Menu1&visible=1
        $result = [];
        $tmp = explode('&', $str);
        foreach($tmp as $item){
            $i = explode('=', $item);
            $result[$i[0]] = $i[1];
        }
        return $result;
    }

    protected function restrictArray($array = [])
    {
        $result = [];
        if(empty($array))
            return false;
        foreach($array as $v){
            $result[$v['name']] = $v['value'];
        }
        return $result;
    }

    public static function start($query)
    {
        Router::dispatch($query);
    }
} 