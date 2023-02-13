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
        $this->data['products'] = $this->productModel->get();

    }

    public function index(){

        View::include('includes/header.php');
        View::include('sales/index-sales.php', $this->data);
        View::include('includes/footer.php');
    }

    public function getItems(int $id){  
        return $this->saleModel->getItems($id);
    }
}

?>