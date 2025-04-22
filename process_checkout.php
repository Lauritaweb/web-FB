<?php
require 'vendor/autoload.php';

use App\Utils\Utils;

use App\Models\Cart;
$cartModel = new Cart();


session_start();
header('Content-Type: application/json');

// Validar si hay productos en el carrito
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo json_encode(['success' => false, 'message' => 'El carrito está vacío.']);
    exit;
}

// Validar datos recibidos
$required = ['nombre', 'apellido', 'email', 'telefono', 'direccion'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        echo json_encode(['success' => false, 'message' => "Falta el campo $field"]);
        exit;
    }
}



// Acá podrías insertar en la base de datos
$cliente = [
    'nombre' => $_POST['nombre'],
    'apellido' => $_POST['apellido'],
    'email' => $_POST['email'],
    'telefono' => $_POST['telefono'],
    'direccion' => $_POST['direccion'],
    'localidad' => "",
];

$_SESSION['cliente'] = $cliente; // Me guardo el cliente en sesion para mandar el whatsapp

$carrito = $_SESSION['cart'];
$envio = 0;
$subtotal = 0;

foreach ($carrito as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}

$total = $subtotal + $envio;

// Simulación de guardado (reemplazá esto con tu INSERT real)
$orden = [
    'cliente' => $cliente,
    'productos' => $carrito,
    'subtotal' => $subtotal,
    'envio' => $envio,
    'total' => $total,
    'fecha' => date('Y-m-d H:i:s')
];

$cartModel->savePurchase($cliente,$orden);


// Si todo salió bien:
// unset($_SESSION['carrito']); // Vaciar el carrito
Utils::mailSenderPurchase($cliente,$carrito);
Utils::mailSenderPurchaseLau($cliente,$carrito);

echo json_encode(['success' => true, 'orden' => $orden]);
