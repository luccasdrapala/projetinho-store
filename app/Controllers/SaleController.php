<?php

namespace App\Controllers;

use App\Models\ProductTypeModel;
use App\Models\ProductModel;
use App\Models\SaleModel;
use App\System\Controller;
use App\Helpers\View;

class SaleController extends Controller
{
    protected ProductModel $productModel;
    protected ProductTypeModel $productTypeModel;
    protected SaleModel $saleModel;
    private array $data;

    public function __construct(){
        $this->saleModel = new SaleModel();
        $this->productModel = new productModel();
        $this->data['sales'] = $this->saleModel->getSales();
        $this->data['products'] = $this->productModel->getQuery();
    }

    public function index(){

        View::include('includes/header.php');
        View::include('sales/index-sales.php', $this->data);
        View::include('includes/footer.php');
    }

    public function getItems(int $id)
    {
        $response = $this->saleModel->getItems($id);
        echo json_encode(["data" => $response, "code" => 200]);
    }

    public function updateSale(array $data, int $id)
    {
        echo json_encode([
            "data" => $this->saleModel->update($id, $data),
            "code" => 200
        ]);
    }

    public function createSale()
    {
        $data = json_decode(\file_get_contents("php://input"), true);
        $items = $data["items"];

        unset($data["items"]);

        $saleId = $this->saleModel->insert($data);

        // se salvou o cabeçalho, salvamos os itens
        if ($saleId > 0) {
            foreach ($items as $item) {
                $item["sale_id"] = $saleId;
                $data = $this->saleModel->createItem($item);
            }
        }

        if ($data) {
            echo json_encode([
                "data" => $item,
                "code" => 201
            ]);
        } else {
            echo json_encode([
                "data" => "Ocorreu um erro ao cadastrar a venda.",
                "code" => 400
            ]);
        }
    }

    public function deleteSale(int $id)
    {
        echo json_encode([
            "data" => $this->saleModel->delete($id),
            "code" => 200
        ]);
    }
}
