<?php
session_start();
require 'vendor/autoload.php';


use App\Utils\Utils;


$productId = $_POST['product_id'];
$quantity = $_POST['quantity'];
$size = $_POST['size'];
$color = $_POST['color'];
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'] ?? null;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Verificar si ya existe el producto con misma config
$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if (
        $item['product_id'] == $productId &&
        $item['size'] == $size &&
        $item['color'] == $color
    ) {
        $item['quantity'] += $quantity;
        $found = true;
        break;
    }
}
unset($item);

if (!$found) {
    $_SESSION['cart'][] = [
        'hash' => Utils::generarCodigo(32),
        'product_id' => $productId,
        'name' => $name,
        'price' => $price,
        'quantity' => $quantity,
        'size' => $size,
        'color' => $color,
        'image' => $image
    ];
}

echo json_encode(['success' => true]);
