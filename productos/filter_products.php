<?php
require '../vendor/autoload.php';

use App\Models\Product;

// Obtener parámetros
$idCategory = $_POST['category'] ?? null;
$sizes = $_POST['sizes'] ?? [];
$colors = $_POST['colors'] ?? [];
$prices = $_POST['prices'] ?? []; // array de strings como ["0-250", "251-500"]

$bikeModel = new Product();

$products = $bikeModel->getFilteredProducts($idCategory, $sizes, $colors, $prices);

echo json_encode($products);
