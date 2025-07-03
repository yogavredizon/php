<?php
require './model/ProductModel.php';
require './db/Database.php';
use PHPUnit\Framework\TestCase;


final class DBTest extends TestCase
{
    public function testConnectToDB(): void
    {
        $host = 'localhost';
        $db_name = 'warehouse_db';
        $username = 'root';
        $password = '';

        $db = new Database($host, $db_name, $username, $password);
        $conn = $db->connection();

        $this->assertInstanceOf(PDO::class, $conn, "Connection should be an instance of PDO");
        $this->assertNotNull($conn, "Connection should not be null");
    }

}

