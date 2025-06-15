<?php

declare(strict_types=1);

spl_autoload_register (function($path){
    require_once __DIR__ . '/../' . str_replace('\\', '/', lcfirst($path) . '.php');
});


use App\HomeController;

$controller = new HomeController();

$controller->index();