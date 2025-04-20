<?php
$idSubCategory=[1,2,3,4];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forever Bikes | Viví la pasión por el ciclismo</title>
    <meta name="description" content="Descubrí Forever Bikes, la comunidad de ciclistas que vive la pasión por las dos ruedas. Encontrá bicicletas, accesorios y service con beneficios exclusivos.">
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
    <header class="container-fluid header bg-one mb-5 mt-5">
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