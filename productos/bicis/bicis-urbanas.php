<?php
$idSubCategory=2;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicicletas Urbanas | Forever Bike - Movete con estilo y libertad</title>
    <meta name="description" content="Descubrí las bicicletas de ruta de Forever Bikes. Ligeras, veloces y listas para entrenar o recorrer la ciudad. Rendimiento, diseño y agilidad sobre dos ruedas.">
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
    <header class="container-fluid header bg-four mb-5 mt-5"></header>
    <!-- Page Header End -->
    <section class="container">
        <div class="text-center mb-5">
          <h2 class="fw-bold fs-2">Urbanas</h2>
          <p class="fs-3 mt-1">Diseñadas para la ciudad, listas para cualquier desafío</p>
          <p class="fs-6 mt-1">Las Forever Bikes Urbanas combinan simplicidad y fuerza. Pensadas para moverse con estilo por entornos exigentes, ofrecen bajo mantenimiento y gran resistencia.<br>
          Con cada pedalada, convertí las calles en una aventura. Descubrí la agilidad, comodidad y confianza que necesitás para moverte libre por la ciudad.</p>
        </div>
        <div class="row text-center">
          <div class="col-md-4 mb-4 border-end">
            <i class="bi bi-shield-check display-4 text-key"></i>
            <h3 class="mt-3 fw-semibold">Resistencia</h3>
            <p class="fs-6">Preparadas para los caminos más duros, estas bicis cuentan con un cuadro sólido y componentes duraderos. </p>
          </div>
          <div class="col-md-4 mb-4 border-end">
            <i class="bi bi-lightning-charge-fill display-4 text-key"></i>
            <h3 class="mt-3 fw-semibold">Agilidad</h3>
            <p class="fs-6">Ligeras y maniobrables, sin resignar firmeza. Ideales para zigzaguear entre autos y moverte con libertad.</p>
          </div>
          <div class="col-md-4 mb-4">
            <i class="bi bi-speedometer2 display-4 text-key"></i>
            <h3 class="mt-3 fw-semibold">Cubiertas versátiles</h3>
            <p class="fs-6">Neumáticos levemente más anchos que brindan tracción y seguridad, sin perder velocidad. Comodidad y control en cada superficie.</p>
          </div>
        </div>
      </section>
  
    <?php  
    include('../shop_engine.php');
    include('../../footer.html');
    include('../shop_engine_js.php');
    ?>

</body>

</html>