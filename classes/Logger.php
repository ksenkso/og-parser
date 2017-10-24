<?php
/**
 * Created by PhpStorm.
 * User: yazun
 * Date: 25.10.2017
 * Time: 0:38
 */

namespace app\classes;


class Logger
{
    public static function log($msg, $file = 'log.txt')
    {
        if (!is_string($msg)) {
            $msg = json_encode($msg);
        }
        file_put_contents(join(DIRECTORY_SEPARATOR, [ROOT, 'tmp', 'logs', $file]), $msg, FILE_APPEND);
    }
}