<?php

namespace app\controllers;

use vendor\core\AppController;
use vendor\core\Session;

class UserController extends AppController
{
    public function __construct($route = '')
    {
        parent::__construct($route);
    }

    public static function authValid()
    {
        $userKey = Session::getValue('AdminAuth');
        if(empty($userKey)){
            header("Location: /login");
            exit;
        }
    }
} 