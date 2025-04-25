<?php
session_start();
require 'vendor/autoload.php';

use App\Utils\Utils;

use App\Models\Cart;
$cartModel = new Cart();

$cliente = $_SESSION['cliente'];
$carrito = $_SESSION['cart'];
$carrito = $_SESSION['cart'];

$envio = 0;
$subtotal = 0;

foreach ($carrito as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}

$total = $subtotal + $envio;

$cartModel->updatePaymentStatus($_SESSION['orden_id'], 1); // Actualizo el estado de la orden a pagado

// Recien aca envio el mail de compra
if ($carrito != null){
    Utils::mailSenderPurchase($cliente,$carrito, $total);
    Utils::mailSenderPurchaseLau($cliente,$carrito, $total);
}

unset($_SESSION['cart']); // Vaciar el carrito
unset($_SESSION['cliente']); // Vaciar el cliente
unset($_SESSION['orden_id']); // Vaciar el orden_id
$_SESSION = []; // Limpia el array en RAM

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias por tu compra | Forever Bikes</title>
    <meta name="description" content="¡Tu próxima aventura ya está en marcha! Gracias por elegir Forever Bikes. Muy pronto tu pedido estará listo para salir a rodar con vos.">
    <link rel="shortcut icon" href="./assets/img/profile-img.jpg" type="image/x-icon">
    <!-- css Bs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- css main -->
    <link rel="stylesheet" href="./assets/styles/css/main.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./assets/vendor/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

</head>

<body class="bg-white">
    <?php include('nav.php'); ?>
    
   

    <!-- Page Header Start -->
    <header class="container-fluid header bg-twenty-seven mb-5 mt-5">
        <div class="d-flex flex-column align-items-center justify-content-center"></div>
    </header>
    <!-- Page Header End -->



    <!-- Checkout Start -->
    
    <section class="container text-center py-5">
        <h1 class="fs-1 fw-bold text-uppercase">¡Gracias por tu compra!</h1>
        <p class="fs-5 mt-4">Tu Forever ya está preparando sus ruedas para encontrarse con vos. <br>
            Te vamos a estar enviando un correo con los detalles del pedido y cualquier novedad.</p>
        <p class="fs-5">Recordá que sos parte de la #FamiliaForever, y eso significa pedalear con beneficios, comunidad y estilo.</p>
        <a href="./index.php" class="btn btn-dark mt-4 px-5 py-3 text-uppercase fw-semibold">Volver al inicio</a>
    </section>
     

    <!-- Checkout End -->

    <?php include('footer.html'); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- js bs -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/vendor/easing/easing.min.js"></script>
    <script src="./assets/vendor/owlcarousel/owl.carousel.min.js"></script>

    <!-- Javascript -->
    <script src="./assets/js/main.js"></script>
  

      
     

</body>

</html>