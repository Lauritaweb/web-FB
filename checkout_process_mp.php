<?php
session_start();
require 'vendor/autoload.php';

use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;

// Configuración del Access Token
$accessToken = getenv('MP_ACCESS_TOKEN');
if (!$accessToken) {
    $accessToken = 'APP_USR-1340048667292847-042419-373b2243be7e259c310098d5b5e977af-64449458'; // Reemplazalo por el real
}

SDK::setAccessToken($accessToken);

// Crear preferencia
$preference = new Preference();
$items = [];

// Agregar productos del carrito
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        $item = new Item();
        $item->title = $product['title'];
        $item->quantity = (int)$product['quantity'];
        $item->unit_price = (float)$product['price'];
        $items[] = $item;
    }
}

$preference->items = $items;

// URLs de retorno
$preference->back_urls = [
    "success" => "https://foreverbikes.com.ar/gracias.php",
    "failure" => "https://foreverbikes.com.ar/pago_fallido.php",
    "pending" => "https://foreverbikes.com.ar/pago_fallido.php"
];
$preference->auto_return = "approved";

// Guardar preferencia
$preference->save();

// Redireccionar al Checkout Pro
header("Location: " . $preference->init_point);
exit;
