<?php

namespace App\Controllers;
   
use App\Models\ProductTypeModel;
use App\System\Controller;
use App\Helpers\View;

class ProductTypeController extends Controller 
{
    protected ProductTypeModel $productTypeModel;
    private array $data;

    public function __construct()
    {
        $this->productTypeModel = new ProductTypeModel();
        //$this->data['product_type'] = 
    }

    public function index()
    {
        View::include('includes/header.php');
        View::include('productTypes/index-type-products.php'); //, $this->data
        View::include('includes/footer.php');
    }
    
    
}


?>