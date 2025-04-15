<?php
require '../../vendor/autoload.php';

use App\Models\Bike;

// Obtener parámetros
$idCategory = $_GET['idCategory'] ?? null;
$sizes = $_GET['sizes'] ?? [];
$colors = $_GET['colors'] ?? [];

$bikeModel = new Bike();
$products = $bikeModel->getFilteredProducts($idCategory, $sizes, $colors);

echo json_encode($products);
