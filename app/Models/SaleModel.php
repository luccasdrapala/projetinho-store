<?php

namespace App\Models;

use App\Db\Database;

class SaleModel extends Database{

    public function __construct()
    {   
        parent::__construct();
        $this->table = 'SaleModel';
    }

}

?>