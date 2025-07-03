<?php
require '../controller/ProductController.php';
require '../repository/ProductRepository.php';
require_once '../db/Database.php';

$host = 'localhost';
$db_name = 'warehouse_db';
$username = 'root';
$password = '';

$database = new Database($host, $db_name, $username, $password);
$productRepository = new ProductRepository($database);
$productController = new ProductController($productRepository);
$products = $productController->getProducts();
// var_dump($products);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inventory</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Stock</th>
            <th>Price</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product["id"]); ?></td>
                <td><?php echo htmlspecialchars($product["name"]); ?></td>
                <td><?php echo htmlspecialchars($product["stock"]); ?></td>
                <td><?php echo htmlspecialchars($product["price"]); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>