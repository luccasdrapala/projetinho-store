<?php

namespace App\Controllers;

use App\Models\ProductTypeModel;
use App\Models\ProductModel;
use App\System\Controller;
use App\Helpers\View;

class ProductController extends Controller
{
    protected ProductModel $productModel;
    private array $data;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->data['product'] = $this->productModel->get();
    }
}

?>