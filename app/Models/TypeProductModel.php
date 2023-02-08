<?php

namespace App\Models;

use App\Db\Database;

class ProductTypeModel extends Database{

    public function __construct()
    {
        $this->table = 'ProductTypeModel';
    }

    // /**
    //  * Product Description
    //  * @var string 
    //  */
    // protected string $description;


    // /**
    //  * Product Tax Percentual
    //  * @var float
    //  */
    // protected float $tax;

}

?>