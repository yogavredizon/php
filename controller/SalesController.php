<?php

class SalesController{
    private $SalesRepository;

    public function __construct(SalesRepository $SalesRepository){
        $this->SalesRepository = $SalesRepository;
    }

    public function addSales(){
        try{
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception("Invalid request method. Use POST to add a product.");
            }

            $name = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];

            if (empty($name) || empty($quantity)) {
                throw new Exception("ID, name, and quantity cannot be empty.");
            }

            if (!is_numeric($quantity)) {
                throw new Exception("ID and quantity must be numeric.");
            }

            $time = date("Y-m-d H:i:s");
            $sales = new SalesModel($name, $quantity, $time, $price);
            $this->SalesRepository->addSales($sales);
        }catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        
    }


    public function getSales(){
        return $this->SalesRepository->getSales();
    }
}
