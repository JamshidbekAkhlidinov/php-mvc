<?php
/*
 *   Jamshidbek Akhlidinov
 *   4 - 5 2023 12:16:26
 *   https://github.com/JamshidbekAkhlidinov
 */

namespace app\core;

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? "/";
        $position = strpos($path, '?');
        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}