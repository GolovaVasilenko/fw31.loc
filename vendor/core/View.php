<?php

namespace vendor\core;


class View
{
    protected $data   = array();
    public $layout    = 'main';
    public $widgets   = array();
    public $meta_data = array();

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    protected function render($template)
    {
        extract($this->data);
        ob_start();
        include_once (APP . '/views/' . $template . '.php');
        $content = ob_get_contents();
        return $content;
    }

    public function display($template, $data = [])
    {
        $this->data = array_merge($this->data, $data);
        if(!empty($this->widgets)){
            extract($this->widgets);
        }
        if(!empty($this->meta_data)){
            extract($this->meta_data);
        }

        $content = $this->render($template);
        ob_end_clean();
        require_once (ROOT . '/templates/'. $this->layout . '.php');
    }
} 