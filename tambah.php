<?php
require_once 'db/Database.php';
require_once 'controller/ProductController.php';
require_once 'model/ProductModel.php';
require_once 'repository/ProductRepository.php';

$host = 'localhost';
$db_name = 'sim_gudang';
$username = 'root';
$password = '';

if (isset($_POST['submit'])) {
    $database = new Database($host, $db_name, $username, $password);
    $productRepository = new ProductRepository($database);
    $productController = new ProductController($productRepository);
    $productController->addProduct();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>

<body>
    <h2>Tambah Produk</h2>
    <form method="POST" action="tambah.php">
        <label for="name">Nama:</label> <br>
        <input type="text" name="name" required>
        <br>
        <label for="stock">Stock:</label> <br>
        <input type="number" name="stock" required> <br>
        <br>
        <label for="price">Price:</label> <br>
        <input type="number" name="Price" required> <br>
        <br>
        <button type="submit" name="submit">Tambah</button>
    </form>
    <a href="tampil.php">Lihat Data</a>
</body>

</html>