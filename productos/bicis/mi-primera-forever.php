<?php
$idSubCategory=4;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi primera Forever | Bicicletas para niños y niñas</title>
    <meta name="description" content="Descubrí las bicicletas Forever pensadas para los más chicos. Modelos seguros, cómodos y llenos de color para acompañar sus primeras aventuras a pedal.">
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
   <header class="container-fluid header bg-eight mb-5 mt-5"></header>
    <!-- Page Header End -->
    <section class="pt-5 container">
        <h1 class="fs-1 text-uppercase text-center">Mini primera Forever</h1>
        <p class="text-center mt-3 mb-5">
          Con ruedas chicas y sueños enormes, las Mini Forever están diseñadas para acompañar los primeros pedaleos de niños y niñas. 
          Bicicletas seguras, resistentes y llenas de color, ideales para aprender jugando y disfrutar con confianza.
          Rodado 12 y 16, adaptadas a cada etapa del crecimiento.
        </p>
        <div class="row text-center">
          <article class="col-md-4 mb-4">
            <i class="bi bi-shield-check fs-1 text-key mb-3"></i>
            <h2 class="fs-4 text-uppercase">Seguridad infantil</h2>
            <p>Diseñadas con frenos suaves, rodado bajo y estructuras estables para que aprendan con confianza desde el primer día.</p>
          </article>
          <article class="col-md-4 mb-4">
            <i class="bi bi-palette fs-1 text-key mb-3"></i>
            <h2 class="fs-4 text-uppercase">Colores que inspiran</h2>
            <p>Modelos llenos de vida y personalidad, pensados para que cada niño y niña elija su compañera ideal.</p>
          </article>
          <article class="col-md-4 mb-4">
            <i class="bi bi-bicycle fs-1 text-key mb-3"></i>
            <h2 class="fs-4 text-uppercase">Rodado 12 y 16</h2>
            <p>Bicis livianas, cómodas y resistentes que acompañan el crecimiento y fomentan el amor por el ciclismo desde pequeños.</p>
          </article>
        </div>
      </section>
      
  
    <?php  
    include('../shop_engine.php');
    include('../../footer.html');
    include('../shop_engine_js.php');
    ?>

</body>

</html>