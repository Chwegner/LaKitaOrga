<?php
require 'config.php';
require 'util/Auth.php';

spl_autoload_register(function ($className) {
    $fileName = 'libs/' . $className . '.php';
    if (file_exists($fileName)) {
        require $fileName;
    }else{
        return;
    }
});

$bootstrap = new Bootstrap();
$bootstrap->init();