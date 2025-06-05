<?php
session_start();
require 'vendor/autoload.php';

use App\Utils\Utils;
use App\Models\Product;

$productId = $_POST['product_id'];
$quantity = $_POST['quantity'];
$id_variant = $_POST['id_variant'];
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'] ?? null;
$selectedSizeId = $_POST['selectedSizeId'] ?? null;
$selectedColorId = $_POST['selectedColorId'] ?? null;

$productModel = new Product();
$variant_stock = 0;
if ($selectedColorId != "undefined" && $selectedSizeId != "undefined"){
    $variant = $productModel->getVariantByProductColorSize($productId, $selectedColorId, $selectedSizeId);
    $variant_id = $variant['id'];
    $variant_stock = $variant['stock'];
}    
else 
    $variant_id = -1;

if ($variant_stock <= 0) {
    echo json_encode(['success' => false, 'message' => 'No hay stock disponible para este producto']);
    exit;
}


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
        'id_variant' => $variant_id,
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

