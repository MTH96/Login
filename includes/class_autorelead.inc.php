<?php
spl_autoload_register('myAutoloader');

function myAutoLoader($className)
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if (strpos($url, 'includes') !== false) {

        $path = "../classes/";
    } else {
        $path = "./classes/";
    }
    $extension = ".class.php";
    $fullpath = $path . strtolower($className) . $extension;
    if (!file_exists($fullpath))
        echo "file not found";
    return false;
    include_once $fullpath;
}
