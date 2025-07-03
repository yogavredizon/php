<?php

class ProductRepository {
    private $db;

    public function __construct(Database $db){
        $this->db = $db;
    }

    public function addProduct(ProductModel $product){
        $conn = $this->db->connection();
        if ($conn){
            try{
                
                $sql = "INSERT INTO products (id, name, stock, price) VALUES ('{$product->getID()}', '{$product->getName()}', '{$product->getQuantity()}', '{$product->getPrice()}')";
                $conn->query($sql);
                echo "Data berhasil ditambahkan.";
            } catch (PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }

        $conn = null; // Close the connection
    }
    public function getProducts(){
        $conn = $this->db->connection();
        if ($conn){
            try{
                $sql = "SELECT * FROM products";
                $stmt = $conn->query($sql);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }
        $conn = null; // Close the connection
        return $result;
    }
}