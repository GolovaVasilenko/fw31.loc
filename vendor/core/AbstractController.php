<?php

namespace vendor\core;


class AbstractController
{
    protected $view;

    protected function loadView()
    {
        $this->view = new View();
    }

    public function redirect($path)
    {
        header("Location: " . $path);
        exit;
    }
} 