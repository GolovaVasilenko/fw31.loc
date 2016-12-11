<?php

namespace app\controllers\admin;

use app\models\Menu;
use app\models\MenuItems;
use vendor\core\Session;

class MenuController extends AdminController
{
    public function __construct($route)
    {
        parent::__construct($route);
    }

    /**
     * @return void
     * render main template for create and update menu
     */
    public function indexAction()
    {
        $this->view->listMenu = Menu::findAll();
        $this->view->display('admin/menu/index');
    }

    /***
     * @return void
     * create menu group
     */
    public function addAction()
    {
        if($this->request->post('add_menu', null)){
            $post = $this->request->ispost();
            if(!$post['title']){
                Session::sessionInit('error', 'Поле Наименование Меню необходимо заполнить!');
            }else{
                $model = new Menu();
                $model->dataInit( Menu::clearData($post) );

                if($model->save())
                    Session::sessionInit('success', 'Меню создано успешно');
            }
        }
        die;
    }

    public function deleteAction()
    {
        $id = $this->request->post('del_menu_id', 0);
        if($id){
            $model = new Menu();
            $model->id = $id;
            if($model->delete())
                die($id) ;
        }
        return false;
    }

    public function createItemAction()
    {
        if($this->request->post('save_item', false)){
            $post = $this->restrictArray($this->request->post('cform', []));
            $post = MenuItems::clearData($post);
            $model = new MenuItems();
            $model->dataInit($post);
            $id = $model->save();
            if($id){

            }
            die($id);
        }
        return false;
    }

    public function itemsMenuAction()
    {
        $menu_id = $this->request->post('menu_id', 0);
        if($menu_id){
            $menuItems = MenuItems::getItemsByColumn('menu_id', $menu_id);
            die(json_encode($menuItems));
        }
        return false;
    }
} 