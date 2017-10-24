<?php
/**
 * Created by PhpStorm.
 * User: yazun
 * Date: 24.10.2017
 * Time: 23:19
 */
define('ROOT', dirname(__FILE__));
/**
 * Class loading function
 *
 * @param string $classname
 */
function autoload_class($classname)
{
    $path = explode('\\', $classname);
    array_shift($path);
    $path = ROOT . DIRECTORY_SEPARATOR . join(DIRECTORY_SEPARATOR, $path) . '.php';
    if (!empty($path) && file_exists($path)) {
        /** @noinspection PhpIncludeInspection */
        include $path;
    }
}

spl_autoload_register('autoload_class');