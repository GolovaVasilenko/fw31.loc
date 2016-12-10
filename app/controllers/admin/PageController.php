<?php

namespace app\controllers\admin;

use app\models\Page;
use vendor\core\Session;

class PageController extends AdminController
{

    public function __construct($route)
    {
        parent::__construct($route);
    }

    public function listAction()
    {
        if($pages = $this->request->post('get_list_pages', false)){
            $pages = Page::findAll();
            die(json_encode($pages));
        }
        $this->view->pages = Page::findAll();
        $this->view->display("admin/pages/list");
    }

    public function addAction()
    {
        if($this->request->post('add_page', null)){
            $model = new Page();
            $model->h1 = Page::clearStr($this->request->post('h1', ''));
            $model->body = $this->request->post('body', '');
            $model->url = $this->request->post('url', '');
            $model->title = Page::clearStr($this->request->post('title', ''));
            $model->keywords = Page::clearStr($this->request->post('keywords', ''));
            $model->description = Page::clearStr($this->request->post('description', ''));

            if(!$model->h1){
                Session::sessionInit('error', 'Поле Заголовка H1 должно быть заполнено');
            }
            else{
                if($model->save()){
                    Session::sessionInit('success', 'Страница сохранена успешно');
                }
                else {
                    Session::sessionInit('error', 'При попытке сохранения страницы произошла ошибка');
                }
            }
        }
        $this->view->display("admin/pages/add");
    }

    public function storeAction()
    {
        if($this->request->post('update_page', null)){
            $model = new Page();
            $model->dataInit( Page::clearData($this->request->ispost()) );
            if($model->save()){
                Session::sessionInit('success', 'Страница успешно сохранена');
                $this->redirect('/admin/page/update?id=' . $model->id);
            }
            else{
                Session::sessionInit('error', 'При попытке сохранения страницы произошла ошибка');
                $this->redirect('/admin/page/update?id=' . $model->id);
            }
        }
    }

    public function updateAction()
    {
        $id = $this->request->get('id', 0);
        if($id){
            $this->view->page = Page::findById($id);
        }
        else {
            $this->redirect('/admin/page/list');
        }
        $this->view->display("admin/pages/update");
    }

    public function deleteAction()
    {
        $id = $this->request->get('id', 0);
        if($id){
            $model = new Page();
            $model->id = $id;
            if($model->delete())
                $this->redirect('/admin/page/list');
        }
    }
} 