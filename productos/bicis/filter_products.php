<?php
require '../../vendor/autoload.php';

use App\Models\Bike;

// Obtener parámetros
$idCategory = $_POST['category'] ?? null;
$sizes = $_POST['sizes'] ?? [];
$colors = $_POST['colors'] ?? [];

$bikeModel = new Bike();
 
$products = $bikeModel->getFilteredProducts($idCategory, $sizes, $colors);

echo json_encode($products);
