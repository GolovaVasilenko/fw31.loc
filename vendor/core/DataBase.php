<?php

namespace vendor\core;


class DataBase {
    private $dbh;

    public static $instance = null;

    private function __construct()
    {
        $options = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try{
            $this->dbh = new \PDO('mysql:dbname='. NAME_DB . ';host=' . HOST_DB, USER_DB, PASS_DB, $options);
            if(!$this->dbh)
            {
                throw new \PDOException();
            }
        }
        catch(\PDOException $pdoError){
            throw new Errors('Соединение с базой даннных не возможно', (int)$pdoError->getCode( ));
        }
    }

    private function __clone(){}

    public static function getInstance()
    {
        if(self::$instance === null)
            self::$instance = new self;
        return self::$instance;
    }

    public function query($sql, $class = 'stdClass', $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if(false !== $res){
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function getDbh() {
        return $this->dbh;
    }
}