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

    public function index()
    {
        View::include('includes/header.php');
        View::include('products/index-products.php', $this->data);
        View::include('includes/footer.php');
    }

    public function createProduct()
    {
        $validator = [];

        if (empty($_POST['description'])) $validator[] = "Product Type is required";
        if (empty($_POST['price'])) $validator[] = "Product Tax is required";
        if (empty($_POST['type_product_id'])) $validator[] = "Id is required";

        if (count($validator) > 0) {
            echo json_encode([
                "code" => 404,
                "data" => "Data not found"
            ]);
        } else {
            echo json_encode([
                "code" => 201,
                "data" => $this->productModel->insert($_POST)
            ]);
        }
    }

    public function updateProduct(int $id)
    {
        $validator = [];

        if (empty($_POST['description'])) $validator[] = "Product Type is required";
        if (empty($_POST['price'])) $validator[] = "Product Tax is required";
        if (empty($_POST['type_product_id'])) $validator[] = "Product type Id is required";

        if (count($validator) > 0) {
            echo json_encode([
                "code" => 404,
                "data" => "Data not found"
            ]);
        } else {
            echo json_encode([
                "code" => 200,
                "data" => $this->productModel->update($id, $_POST)
            ]);
        }
    }

    public function deleteProduct($id)
    {
        echo json_encode([
            "code" => 200,
            "data" => $this->productModel->delete($id)
        ]);
    }
}
