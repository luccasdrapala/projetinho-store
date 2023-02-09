<?php

namespace App\Controllers;
   
use App\Models\ProductTypeModel;
use App\System\Controller;
use App\Helpers\View;

class ProductTypeController extends Controller 
{
    protected ProductTypeModel $productTypeModel;

    public function __construct()
    {
        $this->productTypeModel = new ProductTypeModel();
        // $this->data[''] = 
    }

    public function index()
    {
        View::include('includes/header.php');
        View::include('ProductTypes/index_type_products.php');
        View::include('includes/footer.php');
    }

}


?>