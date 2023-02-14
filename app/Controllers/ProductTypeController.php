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
        View::include('productTypes/index-type-products.php', $this->data);
        View::include('includes/footer.php');
    }

    public function createProductType()
    {
        $validator = [];

        if (empty($_POST['product_description'])) $validator[] = "Product Type is required";
        if (empty($_POST['product_tax'])) $validator[] = "Product Tax is required";

        if (count($validator) > 0) {
            echo json_encode([
                "code" => 404,
                "data" => "Data not found"
            ]);
        } else {
            echo json_encode([
                "code" => 201,
                "data" => $this->productTypeModel->insert($_POST)
            ]);
        }
    }

    public function updateProductType(int $id)
    {
        $validator = [];

        if (empty($_POST['product_description'])) $validator[] = "Product Type is required";
        if (empty($_POST['product_tax'])) $validator[] = "Product Tax is required";

        if (count($validator) > 0) {
            echo json_encode([
                "code" => 404,
                "data" => "Data not found"
            ]);
        } else {
            echo json_encode([
                "code" => 200,
                "data" => $this->productTypeModel->update($id, $_POST)
            ]);
        }
    }

    public function deleteProductType(int $id)
    {
        echo json_encode([
            "code" => 200,
            "data" => $this->productTypeModel->delete($id)
        ]);
    }
}