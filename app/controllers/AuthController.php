<?php


namespace app\controllers;

use vendor\core\Auth;
use vendor\core\Session;
use vendor\core\Request;
use vendor\core\View;
use app\models\Users;

class AuthController extends Auth
{
    protected $view;
    protected $request;
    /*
     * p - alxalxalx7
     * l - g0l0va
     * */

    public function __construct()
    {
        $this->view = new View();
        $this->request = new Request();
        $this->view->layout = 'auth';
    }

    public function loginAction()
    {
        if(isset($_COOKIE['goods_mem']) && $currentUser = Users::findByColumn("secret", $_COOKIE['goods_mem'])){
            Auth::successAuth($currentUser->login, 1);
            header("Location: /admin");
        }

        $login = $this->request->post('login', false);
        $password = $this->request->post('password', false);
        $remember = $this->request->post('remember', 0);

        if($login && $password){
            if(Auth::checkAuth($login, $password))
            {
                Auth::successAuth($login, $remember);
                header("Location: /admin");
            }
            else{
                Session::sessionInit('error', 'Ошибка авторизации - Не верный логин или пароль');
            }
        }
        $this->view->display("auth/login");
    }

    public function logoutAction()
    {
        Session::sessionRemove('AdminAuth');
        header('Location: /');
    }
} 