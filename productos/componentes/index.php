<?php 
$idSubCategory=[5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Componentes para bicicleta | Forever Bikes</title>
    <meta name="description" content="Elegí calidad y rendimiento. Encontrá componentes para mejorar o mantener tu bici: transmisión, frenos, dirección y más. Forever Bikes, siempre a tu ritmo.">
    <link rel="shortcut icon" href="../../assets/img/profile-img.jpg" type="image/x-icon">
    <!-- css Bs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- css main -->
    <link rel="stylesheet" href="../../assets/styles/css/main.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../assets/vendor/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

</head>

<body class="bg-white">
    
    <?php include('../../nav.php'); ?>

    <!-- Page Header Start -->
    <header class="container-fluid header bg-nineteen mb-5 mt-5">
        <div class="d-flex flex-column align-items-center justify-content-center">
        </div>
    </header>
    <!-- Page Header End -->


    <?php  
    include('../shop_engine.php');
    include('../../footer.html');
    include('../shop_engine_js.php');
    ?>
    
</body>

</html>