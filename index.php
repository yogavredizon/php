<?php

require_once 'db/Database.php';
require_once 'controller/SalesController.php';
require_once 'model/SalesModel.php';
require_once 'repository/SalesRepository.php';
require_once 'controller/ProductController.php';
require_once 'model/ProductModel.php';
require_once 'repository/ProductRepository.php';
require_once 'analysis/Seller.php';

$host = 'localhost';
$db_name = 'warehouse_db';
$username = 'root';
$password = '';

$database = new Database($host, $db_name, $username, $password);
$salesRepository = new SalesRepository($database);
$salesController = new SalesController($salesRepository);
$values = $salesController->getSales();
$seller = new Seller();
$salesPrediction = $seller->PredictSales($values); 
?>
<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse Management</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Manajemen Warehouse</h1>
    </header>
    <p>Data Penjualan</p>
    <p>O</p>
    <p>Prediksi Penjualan : <?= $salesPrediction ?></p>
    <nav>
        <ul>
            <li><a href="view/add_product.php">Tambah Produk</a></li>
            <li><a href="view/view_inventory.php">Lihat Inventaris</a></li>
            <li><a href="view/insert_sales.php">Penjualan</a></li>
        </ul>
    </nav>
    <main>
        <h2>Selamat Datang di Sistem Manajemen Warehouse</h2>
    </main>
</body>

</html>
