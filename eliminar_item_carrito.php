<?php
session_start();

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id']) && isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['product_id'] === $data['id']) {
            unset($_SESSION['cart'][$index]);
            // Reindexar el array para evitar "huecos"
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            break;
        }
    }
}

http_response_code(200);