<?php

require_once 'db/Database.php';
require_once 'controller/ProductController.php';
require_once 'model/ProductModel.php';
require_once 'repository/ProductRepository.php';

$host = 'localhost';
$db_name = 'sim_gudang';
$username = 'root';
$password = '';

if (isset($_GET['kode_barang'])) {
    $database = new Database($host, $db_name, $username, $password);
    $productRepository = new ProductRepository($database);
    $productController = new ProductController($productRepository);
    $productController->deleteProductByID($_GET['kode_barang']);
}
?>

<script>
    window.location.replace("tampil.php");
</script>