<?php

vendor\core\Router::add('^logout$', ['controller' => 'auth', 'action' => 'logout']);

vendor\core\Router::add('^login$', ['controller' => 'auth', 'action' => 'login']);

vendor\core\Router::add('^(?P<directory>admin)/(?P<controller>[a-zA-Z\-]+)/?(?P<action>[a-zA-Z\-]+)?$');

vendor\core\Router::add('^(?P<directory>admin)$', ['controller' => 'admin', 'action' => 'index']);

vendor\core\Router::add('^(?P<controller>page)/?(?P<alias>[a-zA-Z0-9\-]+)?$', ['controller' => 'page', 'action' => 'index']);

vendor\core\Router::add('^$', ['controller' => 'page', 'action' => 'home']);

vendor\core\Router::add('^(?P<controller>[a-zA-Z\-]+)/?(?P<action>[a-zA-Z\-]+)?$');