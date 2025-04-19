<?php
session_start();
header('Content-Type: application/json');

// Validar si hay productos en el carrito
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo json_encode(['success' => false, 'message' => 'El carrito está vacío.']);
    exit;
}

// Validar datos recibidos
$required = ['nombre', 'apellido', 'email', 'telefono', 'direccion', 'localidad'];
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
    'localidad' => $_POST['localidad'],
];

$carrito = $_SESSION['cart'];
$envio = 15000;
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

// Si todo salió bien:
unset($_SESSION['carrito']); // Vaciar el carrito
echo json_encode(['success' => true, 'orden' => $orden]);
