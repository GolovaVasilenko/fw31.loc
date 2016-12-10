<?php

namespace app\models;

use vendor\core\AbstractModel;
use vendor\core\DataBase;

class MenuItems extends AbstractModel
{
    public $id;
    public $menu_id;
    public $parent_id;
    public $title;
    public $link;
    public $type_link;
    public $position;

    const TABLE = 'menu_items';

    public function get($key)
    {
        if($key == 'menu'){
            return Menu::findById($this->menu_id);
        }
        else{
            parent::get($key);
        }
    }

    public static function getItemsByColumn($column, $val)
    {
        $db = DataBase::getInstance();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE ' . $column . '=:val ORDER BY position';
        $res = $db->query($sql, get_called_class() , [':val' =>  $val]);
        if(!empty($res))
            return  $res;
        else
            return [];
    }

    public static function getSelectTypes()
    {
        return [
            [
                "name" => "link",
                "value" => "Ссылка",
            ],
            [
                "name" => "page",
                "value" => "Страницы",
            ],
            [
                "name" => "rubric",
                "value" => "Рубрики",
            ],
            [
                "name" => "category",
                "value" => "Категории",
            ],
            [
                "name" => "separator",
                "value" => "Разделитель",
            ]
        ];
    }
} 