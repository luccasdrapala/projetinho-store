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

    public function createProduct(){

        $data = $this->inputPost();
        $validator = [];

        if(empty($_POST['description']))
        {
            $validator[] = "Product Type is required";
        }

        if(empty($_POST['price']))
        {
            $validator[] = "Product Tax is required";
        }

        if(empty($_POST['type_product_id']))
        {
            $validator[] = "Id is required";
        }

        if(count($validator) > 0){
            
            echo json_encode(["data" => "Data not found"]);
            exit;

        } else {

            $response = $this->productModel->insert($data);
            echo json_encode(["data" => $response]);
            exit;            
        }
    }

    public function updateProduct(int $id){

        $data = $this->inputPost();
        $this->productModel->update($id, $data);
        exit;
    }

    public function deleteProduct($id){
        $this->productModel->delete($id);
    }
}
?>