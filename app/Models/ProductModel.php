<?php

namespace App\Models;

use App\Db\Database;

class ProductModel extends Database{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'product';
    }

    public function getQuery()
    {
        $sql = 
        "
        SELECT 
            p.id as `id`, 
            p.price as `price`, 
            p.description as `description`,
            p.type_product_id as `type_id`, 
            pt.product_description AS `type_description`, 
            pt.product_tax as `product_tax`
        FROM 
            `product` as `p` 
        LEFT JOIN 
            `product_type` as `pt`
        on
            (p.type_product_id = pt.id)
        ";

        return $this->executeQuery($sql);
    }
}

?>