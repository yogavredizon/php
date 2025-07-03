<?php

class SalesRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addSales(SalesModel $sales)
    {
        $conn = $this->db->connection();
        if ($conn) {
            try {

                $sql = "INSERT INTO sales (product_id, quantity, price, time) VALUES ('{$sales->getProduct()}', '{$sales->getQuantity()}', '{$sales->getPrice()}', '{$sales->getTime()}')";
                $conn->query($sql);
                echo "Data berhasil ditambahkan.";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        $conn = null; // Close the connection
    }

    public function getSales()
    {
        $conn = $this->db->connection();
        if ($conn) {
            try {
                $stmt = $conn->query("
        SELECT DATE(time) AS sale_date, SUM(quantity) AS total_quantity
        FROM sales
        GROUP BY DATE(time)
        ORDER BY sale_date ASC
    ");

                $dailyQuantities = [];
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $dailyQuantities[] = (int)$row['total_quantity'];
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        $conn = null; // Close the connection
        return $dailyQuantities;
    }
}
