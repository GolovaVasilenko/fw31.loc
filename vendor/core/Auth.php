<?php

namespace vendor\core;


use app\models\Users;

class Auth {

    public static $saltPass = 'wD4y2fbx843iOfD51Esd';
    public static $saltKey  = 'rG7yr3kj627isVq51Ht5';

    public static function cashPassword($pass, $saltPass)
    {
        return md5($pass . $saltPass);
    }

    public static function cashSecretKey($time, $login, $saltKey)
    {
        return md5($time . $saltKey . $login);
    }
    /**
     * @param $login
     * @param $password
     * @return if user exist return user id else return false
     */
    public static function checkAuth($login, $password)
    {
        if($currentUser = Users::findByColumn('login', $login)){
            if($currentUser->password === self::cashPassword($password, self::$saltPass)) {
                return true;
            }
        }
        return false;
    }

    public static function successAuth($login, $remember)
    {
        $secretKey = self::cashSecretKey(time(), $login, self::$saltKey);
        Session::sessionInit('AdminAuth', $secretKey);
        if($remember){
            setcookie('goods_mem', $secretKey, time()+3600*24*30);
            $user = new Users();
            $user->updateSecretKey($secretKey, $login);
        }
    }
} 