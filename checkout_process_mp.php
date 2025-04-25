<?php
session_start();
require 'vendor/autoload.php';

use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;

$uuid = $_SESSION['uuid'];

// Configuración del Access Token
$accessToken = getenv('MP_ACCESS_TOKEN');
if (!$accessToken) {
    $accessToken = 'APP_USR-6078037080788097-010917-cb3190d40d6413962b474777b48ec72c-67897237';
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
    "success" => "https://foreverbikes.com.ar/gracias.php?uuid=$uuid",
    "failure" => "https://foreverbikes.com.ar/pago_fallido.php",
    "pending" => "https://foreverbikes.com.ar/pago_fallido.php"
];
$preference->auto_return = "approved";

// Guardar preferencia
$preference->save();

// Redireccionar al Checkout Pro
header("Location: " . $preference->init_point);
exit;
