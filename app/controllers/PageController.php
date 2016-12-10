<?php
namespace app\controllers;

use app\models\Page;
use vendor\core\AppController;

class PageController extends AppController
{

    public function homeAction()
    {
        $this->view->display("page/home");
    }

    public function indexAction()
    {
        $page = Page::findByColumn('url', $this->route['alias']);
        $this->view->page = $page;
        $this->view->display("page/index");
    }
} 