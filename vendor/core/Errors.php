<?php

namespace vendor\core;

class Errors extends \Exception
{
    protected $message = '';
    protected $code;
    protected $view;

    public function __construct($message, $code = '404')
    {
        $this->message = $message;
        $this->code = $code;
        $this->view = new View;
    }

    public function index()
    {
        $this->view->code = $this->code;
        $this->view->message = $this->message;
        $this->view->display('error/index');
    }
} 