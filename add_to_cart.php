<?php
session_start();
require 'vendor/autoload.php';

use App\Utils\Utils;

$productId = $_POST['product_id'];
$quantity = $_POST['quantity'];
$id_variant = $_POST['id_variant'];
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'] ?? null;

// Obtener size y color del id_variant
$size = $_POST['size'] ?? null;
$color = $_POST['color'] ?? null;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Verificar si ya existe el producto con misma variante (usando id_variant y color)
$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if (
        $item['product_id'] == $productId &&
        $item['id_variant'] == $id_variant &&
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
        'id_variant' => $id_variant,
        'size' => $size,
        'color' => $color,
        'image' => $image
    ];
}

$totalItems = array_sum(array_column($_SESSION['cart'], 'quantity'));

echo json_encode([
    'success' => true,
    'total_items' => $totalItems
]);
?>

