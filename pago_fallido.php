<?php
session_start();
$_SESSION['orden_id'] = null; // Elimino la orden de pago, para que nadie intente ir al gracias y establecerlas como paga
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error en el pago | Forever Bikes</title>
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
        <h1 class="fs-1 fw-bold text-uppercase">¡Ha habido un error en el pago!</h1>
        
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