<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ ); // ajustá según ubicación del .env
$dotenv->load();

$mysqli = new mysqli(
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS'],
    $_ENV['DB_NAME'],
    $_ENV['DB_PORT']
);

if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}

// Obtenemos todas las subcategorías presentes en products
$query = "SELECT id FROM subcategories";
$result = $mysqli->query($query);

while ($row = $result->fetch_assoc()) {
    $idSubcategory = $row['id'];

    // Obtenemos el precio mínimo y máximo para esta subcategoría
    $stmt = $mysqli->prepare("
        SELECT MIN(price) as min_price, MAX(price) as max_price
        FROM products
        WHERE id_subcategory = ?
    ");
    $stmt->bind_param("i", $idSubcategory);
    $stmt->execute();
    $stmt->bind_result($minPrice, $maxPrice);
    $stmt->fetch();
    $stmt->close();

    if ($minPrice !== null && $maxPrice !== null) {
        // Intentamos actualizar primero
        $update = $mysqli->prepare("
            UPDATE subcategories_ranges
            SET min_price = ?, max_price = ?
            WHERE id_subcategory = ?
        ");
        $update->bind_param("ddi", $minPrice, $maxPrice, $idSubcategory);
        $update->execute();

        // Si no se actualizó ninguna fila, lo insertamos
        if ($update->affected_rows === 0) {
            $insert = $mysqli->prepare("
                INSERT INTO subcategories_ranges (id_subcategory, min_price, max_price)
                VALUES (?, ?, ?)
            ");
            $insert->bind_param("idd", $idSubcategory, $minPrice, $maxPrice);
            $insert->execute();
            $insert->close();
        }

        $update->close();
    }
}

$mysqli->close();

echo "Actualización de rangos de subcategorías completada.\n";
