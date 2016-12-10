<?php

namespace app\models;

use vendor\core\AbstractModel;

class Page extends AbstractModel
{

    public $id;
    public $title;
    public $description;
    public $keywords;
    public $h1;
    public $body;
    public $url;

    const TABLE = "pages";

} 