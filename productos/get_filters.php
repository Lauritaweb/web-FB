<?php
session_start();
require '../vendor/autoload.php';

use App\Models\Product;

$idSubcategory = isset($_GET['idSubcategory']) ? intval($_GET['idSubcategory']) : 0;

$bikeModel = new Product();
$colorResult = $bikeModel->getAllColors();
$sizeResult  = $bikeModel->getAllSizes();
$priceResult = $bikeModel->getSubcategoriesPrices($idSubcategory);



// Convertir a formato esperado (id y description)
$colors = array_map(function ($color) {
    return [
        'id' => $color['id'],
        'description' => $color['description']
    ];
}, $colorResult);

$sizes = array_map(function ($size) {
    return [
        'id' => $size['id'],
        'description' => $size['description']
    ];
}, $sizeResult);



$min = (int) $priceResult['min_price'];
$max = (int) $priceResult['max_price'];

$rangeCount = 3;
$rangeSize = ceil(($max - $min) / $rangeCount);

$priceRanges = [];

for ($i = 0; $i < $rangeCount; $i++) {
    $start = $min + ($i * $rangeSize);
    $end = ($i === $rangeCount - 1) ? $max : $start + $rangeSize - 1;

    $priceRanges[] = [
        'id' => "{$start}-{$end}", // Esto servirá como el value del checkbox
        'label' => "$" . number_format($start, 0, ',', '.') . " - $" . number_format($end, 0, ',', '.')
    ];
}


// Retornar como JSON
echo json_encode([
    'colors' => $colors,
    'sizes' => $sizes,
    'prices' => $priceRanges
]);


/*
$colors = [];
foreach($colorResult as $color){
    $colors[$color['id']] = $color['description'];
}

$sizes = [];
foreach($sizeResult as $size){
    $sizes[$size['id']] = $size['description'];
}
*/