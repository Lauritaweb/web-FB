<?php
session_start();
require '../vendor/autoload.php';

use App\Models\Bike;

$bikeModel = new Bike();
$colorResult = $bikeModel->getAllColors();
$sizeResult  = $bikeModel->getAllSizes();



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


// Retornar como JSON
echo json_encode([
    'colors' => $colors,
    'sizes' => $sizes
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