<?php

header('Content-Type: text/html; charset=utf-8');

/**
 * Inicio da aplicação
 * @author  Michael Douglas Soares
 * @link    http://www.utpmaissaudavel.com.br
 * @version 1.0
 */
session_start();
require 'config.php';

spl_autoload_register(function ($class) {
    
    if (strpos($class, 'Controller') > -1) {
        if (file_exists('controllers/' . $class . '.php')) {
            require_once 'controllers/' . $class . '.php';
        }
    } elseif (file_exists('models/' . $class . '.php')) {        
        require_once 'models/' . $class . '.php';
    } elseif (file_exists('core/' . $class . '.php')) {
        require_once 'core/' . $class . '.php';
    } elseif (file_exists('libs/' . $class . '.php')) {
        require_once 'libs/' . $class . '.php';
    }
});

$core = new Core();
$core->run();
