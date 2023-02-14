<?php

namespace App\System;

class Controller
{
    protected array $response;

    public function inputPost(int $filter = FILTER_SANITIZE_FULL_SPECIAL_CHARS)
    {
        return filter_var_array($_POST, $filter); //return the filtered array
    }
}
