<?php

require_once './src/Database.php';
require_once './src/Product.php';
require_once './model/ProductModel.php';

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase{
    public function testAddProduct(): void
    {
        $host = 'localhost';
        $db_name = 'warehouse_db';
        $username = 'root';
        $password = '';

        $db = new Database($host, $db_name, $username, $password);
        $p = new ProductModel(1, 'Test Product', 100, 1000);
        $productModel = new ProductRepository($db);
        $productModel->addProduct($p);

        $this->assertInstanceOf(ProductModel::class, $p, "Product should be an instance of ProductModel");
        $this->assertEquals(1, $p->getID(), "Product ID should  be 1");
        $this->assertEquals('Test Product', $p->getName(), "Product name  should be 'Test Product'");
        $this->assertEquals(100, $p->getQuantity(), "Product quantity should be 100");
    }
}
