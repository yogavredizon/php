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
                
                $sql = "INSERT INTO barang (nama_barang, stok_barang) VALUES ('{$product->getName()}', '{$product->getQuantity()}')";
                $conn->query($sql);
                echo "Data berhasil ditambahkan.";
            } catch (PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }

        $conn = null; // Close the connection
    }
    public function deleteById($id){
        $conn = $this->db->connection();
        if ($conn){
            try{
                $sql = "Delete from barang where kode_barang = '{$id}'";                
                $conn->query($sql);
                echo "Data berhasil dihapus.";
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
                $sql = "SELECT * FROM barang";
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