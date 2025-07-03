<?php

class ProductController{
    private $ProductRepository;

    public function __construct($ProductRepository){
        $this->ProductRepository = $ProductRepository;
    }

    public function addProduct(){
        try{
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                throw new Exception("Invalid request method. Use POST to add a product.");
            }

            $id = $_POST['id'];
            $name = $_POST['name'];
            $stock = $_POST['stock'];
            $price = $_POST['price'];

            if (empty($id) || empty($name) || empty($stock)) {
                throw new Exception("ID, name, and stock cannot be empty.");
            }

            if (!is_numeric($id) || !is_numeric($stock)) {
                throw new Exception("ID and stock must be numeric.");
            }

            $product = new ProductModel($id, $name, $stock, $price);
            $this->ProductRepository->addProduct($product);
        }catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        
    }


    public function getProducts(){
        return $this->ProductRepository->getProducts();
    }
}
