<?php
/*
require 'vendor/autoload.php';

use App\Models\Cart;
$cartModel = new Cart();

session_start();
$cartModel->sendMessage($_SESSION['cliente'] ,$_SESSION['cart']);
unset($_SESSION['cart']); // Vaciar el carrito
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forever Bikes | Viví la pasión por el ciclismo</title>
    <meta name="description" content="Descubrí Forever Bikes, la comunidad de ciclistas que vive la pasión por las dos ruedas. Encontrá bicicletas, accesorios y service con beneficios exclusivos.">
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
    <header class="container-fluid header bg-two mb-5 mt-5">
        <div class="d-flex flex-column align-items-center justify-content-center"></div>
    </header>
    <!-- Page Header End -->


    <div class="d-inline-flex container-fluid px-xl-5">
        <p class="m-0"><a href="./index.html" class="fw-bold text-dark">Home</a></p>
        <p class="m-0 px-2">-</p>
        <p class="m-0">Checkout</p>
    </div>

    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <p> Gracias por tu compra!</p>       
    </div>
    <!-- Checkout End -->

    <?php include('../../footer.html'); ?>

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