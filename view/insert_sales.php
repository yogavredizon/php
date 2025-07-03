<?php

require_once '../db/Database.php';
require_once '../controller/SalesController.php';
require_once '../model/SalesModel.php';
require_once '../repository/SalesRepository.php';
require_once '../controller/ProductController.php';
require_once '../model/ProductModel.php';
require_once '../repository/ProductRepository.php';

$host = 'localhost';
$db_name = 'warehouse_db';
$username = 'root';
$password = '';

// if (isset($_POST['submit'])) {
$database = new Database($host, $db_name, $username, $password);
$productRepository = new ProductRepository($database);
$productController = new ProductController($productRepository);
$products = $productController->getProducts();

$salesRepository = new SalesRepository($database);
$salesController = new SalesController($salesRepository);

if (isset($_POST["submit"])){
    $salesController->addSales();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Penjualan</title>
    <script>
        // Simpan data harga berdasarkan ID produk
        const productPrices = <?php echo json_encode(array_column($products, 'price', 'id')); ?>;

        // Ketika produk dipilih, isi input harga otomatis
        function updatePrice() {
            const select = document.getElementById('product_id');
            const selectedId = select.value;
            const priceInput = document.getElementById('price');

            if (productPrices[selectedId]) {
                priceInput.value = productPrices[selectedId];
            } else {
                priceInput.value = '';
            }
        }
    </script>
</head>
<body>
    <h2>Form Input Penjualan</h2>
    <form action="insert_sales.php" method="POST">
        <label for="product_id">Produk:</label>
        <select name="product_id" id="product_id" onchange="updatePrice()" required>
            <option value="">-- Pilih Produk --</option>
            <?php foreach ($products as $product): ?>
                <option value="<?= htmlspecialchars($product['id']) ?>">
                    <?= htmlspecialchars($product['name']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="quantity">Jumlah:</label>
        <input type="number" name="quantity" id="quantity" required min="1"><br><br>

        <label for="price">Harga Satuan:</label>
        <input type="number" name="price" id="price" required min="0" readonly><br><br>

        <input type="submit" name="submit" value="Simpan Penjualan">
    </form>
</body>
</html>