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
        $this->data['product_type'] = $this->productTypeModel->get();
    }

    public function index()
    {
        View::include('includes/header.php');
        View::include('productTypes/index-type-products.php', $this->data); //, $this->data
        View::include('includes/footer.php');
    }
    
    public function createProductType() {

        $data = $this->inputPost();
        $validator = [];

        if(empty($_POST['product_description']))
        {
            $validator[] = "Product Type is required";
        }

        if(empty($_POST['product_tax']))
        {
            $validator[] = "Product Tax is required";
        }

        if(count($validator) > 0){
            
            echo json_encode(["data" => "Data not found"]);
            exit;

        } else {

            $response = $this->productTypeModel->insert($data);
            echo json_encode(["data" => $response]);
            exit;            
        }

    }
}


?>