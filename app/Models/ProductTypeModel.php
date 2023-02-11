<?php

namespace App\Models;

use App\Db\Database;

class ProductTypeModel extends Database{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'product_type';
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