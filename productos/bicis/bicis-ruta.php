<?php
$idSubCategory=3;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicicletas Ruta | Forever Bike - Movete veloz</title>
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
    <header class="container-fluid header bg-five mb-5 mt-5"></header>
    <!-- Page Header End -->
    <section class="container py-5">
        <div class="text-center mb-5">
          <h2 class="fw-bold">Ruta</h2>
          <p class="fs-3 mt-1">Liviandad y velocidad para volar sobre el asfalto</p>
          <p class="fs-6">Las Forever Bikes Ruta están pensadas para quienes quieren más: más kilómetros, más velocidad, más libertad. Diseñadas para rendir al máximo sobre pavimento, son ideales tanto para entrenar como para moverte ágilmente por la ciudad. 
        Con un diseño liviano y componentes de alto rendimiento, cada pedaleada es un impulso hacia tu mejor versión.</p>
        </div>
        <div class="row text-center">
          <div class="col-md-4 mb-4">
            <i class="bi bi-feather display-4 text-key"></i>
            <h3 class="mt-3 fw-semibold">Liviandad</h3>
            <p class="fs-6">Subir escaleras, cargarla en el subte o guardarla en casa ya no es un problema. Su peso ultraliviano te acompaña donde vayas.</p>
          </div>
          <div class="col-md-4 mb-4">
            <i class="bi bi-lightning-charge-fill display-4 text-key"></i>
            <h3 class="mt-3 fw-semibold">Velocidad</h3>
            <p class="fs-6">Nacidas para ir rápido. Ideales para rodadas largas, entrenamientos o moverte con fluidez en el día a día urbano.</p>
          </div>
          <div class="col-md-4 mb-4">
            <i class="bi bi-record-circle display-4 text-key"></i>
            <h3 class="mt-3 fw-semibold">Cubiertas finas</h3>
            <p class="fs-6">Cubiertas de alta presión que reducen el roce con el suelo. Te brindan un andar veloz, ágil y preciso, incluso en trayectos exigentes.</p>
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