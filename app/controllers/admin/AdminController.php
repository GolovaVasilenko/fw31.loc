<?php

namespace app\controllers\admin;

use app\controllers\UserController;
use vendor\core\AppController;

class AdminController extends AppController
{
    public function __construct($route = '')
    {
        parent::__construct($route);
        UserController::authValid();
        $this->view->layout = 'admin';
    }

    public function indexAction()
    {
        $this->view->display("admin/index");
    }
} 