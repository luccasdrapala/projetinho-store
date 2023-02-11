<?php

namespace App\Models;

use App\Db\Database;

class ProductModel extends Database{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'product';
    }

    // /**
    //  * Product Primary Key
    //  * @var integer
    //  */
    // protected int $id;

    // /**
    //  * 
    //  */

}

?>