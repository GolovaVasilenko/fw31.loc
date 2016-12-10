<?php

namespace app\models;

use vendor\core\AbstractModel;

class Menu extends AbstractModel
{
    public $id;
    public $title;
    public $visible;

    const TABLE = 'menu';
} 