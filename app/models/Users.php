<?php

namespace app\models;

use vendor\core\AbstractModel;
use vendor\core\DataBase;

class Users extends AbstractModel
{
    public $id;
    public $email;
    public $password;
    public $secret;
    public $active;
    public $login;

    const TABLE = "users";

    public function updateSecretKey($secret, $login)
    {
        $sql = "UPDATE " . self::TABLE . " SET secret=:secret WHERE login=:login";
        $db = DataBase::getInstance();
        return $db->execute($sql, [":secret" => $secret, ":login" => $login]);
    }
} 