<?php
spl_autoload_register(function($className) {
    $objDir = "./model/{$className}.php";
    if (file_exists($objDir)) {
        require_once $objDir;
    } else {
        throw new Exception("{$className} doesn't exists");
    }
});