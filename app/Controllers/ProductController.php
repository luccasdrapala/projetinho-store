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
        $this->data['getProducts'] = $this->productModel->getQuery();
    }

    public function index(){

        View::include('includes/header.php');
        View::include('products/index-products.php', $this->data);
        View::include('includes/footer.php');
    }

    public function create(){

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

            //$response = $this->productTypeModel->insert($data);
            echo json_encode(["data" => $response]);
            exit;            
        }

    }
}
?>