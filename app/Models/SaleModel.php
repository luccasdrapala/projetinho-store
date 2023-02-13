<?php

namespace App\Models;

use App\Db\Database;

class SaleModel extends Database{

    public function __construct()
    {   
        parent::__construct();
        $this->table = 'sales';
    }

    // public function getAll()
    // {
    //     $sql = "SELECT 
    //                 (total_price - total_tax) as total_items, total_tax, created_at, total_price 
    //             FROM 
    //                 sales
    //             ORDER BY 
    //                 id DESC";
        
    //     return $this->executeQuery($sql);
    // }
}

?>