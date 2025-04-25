<?php
ob_start(); // Empezamos a capturar el contenido HTML

$nombre = htmlspecialchars($cliente['nombre']);
$apellido = htmlspecialchars($cliente['apellido']);
$email = htmlspecialchars($cliente['email']);
$telefono = htmlspecialchars($cliente['telefono']);
$direccion = htmlspecialchars($cliente['direccion']);
$localidad = htmlspecialchars($cliente['localidad']);
$provincia = htmlspecialchars($cliente['provincia'] ?? ''); // si no tenés provincia, dejalo vacío
$zip = htmlspecialchars($cliente['zip'] ?? '');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gracias por tu compra</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px; color: #333;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border: 1px solid #ddd; padding: 20px;">
      <tr>
        <td style="text-align: center;">
          <img src="https://foreverbikes.com.ar/assets/img/logo-forever-bikes.svg" alt="">
          <h1 style="color: #000; font-size: 24px; margin-bottom: 10px;">Nuevo pedido desde Forever Bikes</h1>
          <p style="font-size: 14px; color: #777;">Detalles de facturación y resumen del carrito</p>
        </td>
      </tr>

      <tr>
        <td style="padding: 20px 0;">
          <h2 style="font-size: 18px; border-bottom: 1px solid #ccc; padding-bottom: 5px;">Datos de facturación</h2>
          <p style="margin: 5px 0;"><strong>Nombre:</strong> <?= $nombre ?></p>
          <p style="margin: 5px 0;"><strong>Apellido:</strong> <?= $apellido ?></p>
          <p style="margin: 5px 0;"><strong>Email:</strong> <?= $email ?></p>
          <p style="margin: 5px 0;"><strong>Celular:</strong> <?= $telefono ?></p>
          <p style="margin: 5px 0;"><strong>Dirección:</strong> <?= $direccion ?></p>
          <p style="margin: 5px 0;"><strong>Provincia:</strong> <?= $provincia ?></p>
          <p style="margin: 5px 0;"><strong>Localidad:</strong> <?= $localidad ?></p>
          <p style="margin: 5px 0;"><strong>ZIP Code:</strong> <?= $zip ?></p>
        </td>
      </tr>

      <tr>
        <td>
          <h2 style="font-size: 18px; border-bottom: 1px solid #ccc; padding-bottom: 5px;">Orden de productos</h2>

        <?php 
        foreach ($cart as $item):
        ?>
          <p style="margin: 5px 0;"><strong>Producto:</strong> <?= htmlspecialchars($item['nombre']) ?></p>
          <p style="margin: 5px 0;"><strong>Cantidad:</strong> <?= $item['cantidad'] ?></p>
          <p style="margin: 5px 0;"><strong>Precio:</strong> $<?= number_format($item['precio'], 2, ',', '.') ?></p>
          <hr style="border-top: 1px solid #ccc; margin: 20px 0;">
        <?php endforeach; ?>


        <!--  <p style="margin: 5px 0;"><strong>Subtotal:</strong> $<?= number_format($subtotal, 2, ',', '.') ?></p> -->
        <!--  <p style="margin: 5px 0;"><strong>Envío:</strong> $<?= number_format($envio, 2, ',', '.') ?></p> -->
          <h3 style="margin-top: 10px; font-size: 18px;"><strong>Total:</strong> $<?= number_format($total, 2, ',', '.') ?></h3>
        </td>
      </tr>

      <tr>
        <td style="text-align: center; padding-top: 20px;">
          <p style="font-size: 13px; color: #999;">Forever Bikes - Pedido web</p>
        </td>
      </tr>
    </table>
</body>
</html>

<?php
$htmlEmail = ob_get_clean(); // Fin de captura del HTML