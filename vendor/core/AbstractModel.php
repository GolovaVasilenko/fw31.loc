<?php

namespace vendor\core;

abstract class AbstractModel
{
    public static $saltPass = 'wD4y2fbx853iOfD51Esd';
    public static $saltKey  = 'rG7yr3kj624isVq51Ht5';

    const TABLE = '';

    public static function cashPassword($pass, $saltPass)
    {
        return md5($pass . $saltPass);
    }

    public static function cashSecretKey($cdate, $login, $saltKey)
    {
        return md5($cdate . $saltKey . $login);
    }

    public static function findAll($order = 'ASC')
    {
        $db = DataBase::getInstance();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id ' . $order;
        return $db->query($sql, get_called_class() );
    }

    public static function findById($id)
    {
        $db = DataBase::getInstance();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $res = $db->query($sql, get_called_class() , [':id' =>  $id]);
        if(!empty($res[0]))
            return  $res[0];
        else
            return [];
    }

    public static function findByColumn($column, $val)
    {
        $db = DataBase::getInstance();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE ' . $column . '=:val';
        $res = $db->query($sql, get_called_class() , [':val' =>  $val]);
        if(!empty($res[0]))
            return  $res[0];
        else
            return [];
    }

    protected function insert()
    {
        $columns = [];
        $values = [];
        foreach($this as $k => $v)
        {
            if('id' == $k)
                continue;

            $columns[] = $k;
            $values[':'.$k] = $v;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(', ', $columns) . ') VALUES (' . implode(', ', array_keys($values)) . ')';
        $db = DataBase::getInstance();
        $result = $db->execute($sql, $values);
        if($result){
            $id = $db->getDbh()->lastInsertId();
        }
        else{
            $id = false;
        }
        return $id;
    }

    protected function update()
    {
        $ins = [];
        $dataExec = [];
        foreach($this as $key => $val)
        {
            if(!empty($val))
                $dataExec[':' . $key] = $val;
            if('id' == $key || null === $val){
                continue;
            }
            if(!empty($val))
                $ins[] = $key . ' = :' .$key;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(', ', $ins) . ' WHERE id = :id';

        $db = DataBase::getInstance();
        return $db->execute($sql, $dataExec);
    }

    public function save()
    {
        if(empty($this->id))
        {
            return $this->insert();
        }
        else{
            return $this->update();
        }
    }

    public function delete()
    {
        $db = DataBase::getInstance();
        $sql = 'DELETE FROM ' . static::TABLE. ' WHERE id = :id';
        if(isset($this->id))
            return $db->execute($sql, array(':id' => $this->id));
    }

    public function __isset($name) {
        return isset($this->$name);
    }

    /**
     * @param $arr
     * Наполняет свойства модели данными
     */
    public function dataInit($arr)
    {
        foreach($arr as $k => $v)
        {
            $this->set($k, $v);
        }
    }


    public static function clearData($data)
    {
        if(is_numeric($data)){
            return (int)$data;
        }

        if(is_string($data)){
            return static::clearStr($data);
        }

        if(is_array($data)){
            foreach($data as $key => &$item){
                if(is_numeric($item) and 'artikul' != $key){
                    $item = (int) $item;
                }
                if(is_string($item)){
                    if('body' === $key or 'content' === $key)
                        continue;
                    $item = static::clearStr($item);
                }
            }
        }
        return $data;
    }

    public static function clearStr($str)
    {
        return htmlspecialchars(strip_tags(stripslashes(trim($str))));
    }

    public function get($key)
    {
        if (property_exists($this, $key)) {
            return $this->{$key};
        }

        return null;
    }

    public function set($key, $val)
    {
        if (property_exists($this, $key)) {
            $this->{$key} = $val;
            return true;
        }

        return false;
    }
} 