<?php

namespace App\Helpers;

class View 
{
    public static function include(string $viewName, array $data = [])
    {
        extract($data); //function to put the Model data in index

        $file = \dirname(__FILE__, 2). "/Views/{$viewName}.php"; //verify if the file exists

        if(!file_exists($file))
        {
            die ("File not Found");
        }

        require $file;
    }
}

?>