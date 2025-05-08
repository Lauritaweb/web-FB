<?php
session_start();

$totalItems = 0;
if (isset($_SESSION['cart'])) {
    $totalItems = array_sum(array_column($_SESSION['cart'], 'quantity'));
}

echo json_encode(['count' => $totalItems]);