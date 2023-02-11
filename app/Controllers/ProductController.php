<?php

namespace App\Controllers;

use App\Models\ProductTypeModel;
use App\Models\ProductModel;
use App\System\Controller;
use App\Helpers\View;

class ProductController extends Controller
{
    protected ProductModel $productModel;
    protected ProductTypeModel $productTypeModel;
    private array $data;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->productTypeModel = new ProductTypeModel();
        $this->data['product'] = $this->productModel->get();
        $this->data['product_type'] = $this->productTypeModel->get();
    }

    public function index(){

        View::include('includes/header.php');
        View::include('products/index-products.php', $this->data);
        View::include('includes/footer.php');
    }
}

?>