<?php
require '../vendor/autoload.php';

use App\Models\Product;

// Obtener parámetros
$idCategory = $_POST['category'] ?? null;
$sizes = $_POST['sizes'] ?? [];
$colors = $_POST['colors'] ?? [];

$bikeModel = new Product();
 
$products = $bikeModel->getFilteredProducts($idCategory, $sizes, $colors);

echo json_encode($products);
