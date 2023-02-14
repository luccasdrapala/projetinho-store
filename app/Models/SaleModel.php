<?php

namespace App\Models;

use App\Db\Database;

class SaleModel extends Database{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'sales';
    }

    public function getSales()
    {
        $sql = "SELECT
                    (total_price - total_tax) as total_items, total_tax, created_at, total_price, id
                FROM
                    sales
                ORDER BY
                    id DESC";

        return $this->executeQuery($sql);
    }

    public function getItems(int $id): array
    {
        $sql = "SELECT
                    sales_item.*,
                    product.description as product_name
                FROM
                    sales_item
                INNER JOIN
                    product ON sales_item.product_id = product.id
                INNER JOIN
                    product_type ON product.type_product_id = product_type.id
                WHERE
                    sale_id = {$id}
                ORDER BY
                    id DESC";

        return $this->executeQuery($sql);
    }

    public function createItem(array $data)
    {
        return $this->insert($data, "sales_item");
    }
}