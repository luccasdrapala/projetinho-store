<?php

namespace App\Helpers;

class View
{
    public static function include(string $viewName, array $data = [])
    {
        extract($data);

        $file = \dirname(__FILE__, 2)."/Views/{$viewName}";

        if (!file_exists($file)) {
            die("View {$file} file not exists");
        }

        require $file;
    }
}
