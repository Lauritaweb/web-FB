<?php
$idSubCategory=3;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicicletas Todo Terreno | Forever Bikes  – Libertad sobre ruedas</title>
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
    <header class="container-fluid header bg-six mb-5 mt-5"></header>
    <!-- Page Header End -->
    <section class="container my-5">
        <div class="text-center mb-5">
          <h1 class="fs-1 text-uppercase">Todo Terreno</h1>
          <p class="lead">
            Todos los caminos que imaginás en una sola bici. Las Forever Bikes Todo Terreno son una invitación a viajar, salir de la ciudad, descubrir senderos y explorar en libertad.
            Lánzate a la aventura con una bici que combina agilidad urbana y potencia en la naturaleza. Conquistá cada terreno con el equilibrio perfecto entre rendimiento urbano y espíritu outdoor.
          </p>
        </div>
      
        <div class="row text-center">
          <div class="col-md-4 px-4 mb-4">
            <i class="bi bi-compass fs-1 text-key mb-3"></i>
            <h3 class="fs-4 fw-bold">Versatilidad total</h3>
            <p>
              Creamos las Forever Bikes Todo Terreno para quienes buscan maniobras ágiles y gran potencia para adentrarse en la naturaleza. Desde la jungla urbana hasta los caminos de tierra, son tu pase directo a la aventura.
            </p>
          </div>
      
          <div class="col-md-4 px-4 mb-4">
            <i class="bi bi-globe-americas fs-1 text-key mb-3"></i>
            <h3 class="fs-4 fw-bold">Viajera</h3>
            <p>
              Si estás planeando viajar en bici, diste con tu compañera de ruta. Postura cómoda, rodadas extensas y componentes resistentes para soportar cada kilómetro, sin resignar disfrute.
            </p>
          </div>
      
          <div class="col-md-4 px-4 mb-4">
            <i class="bi bi-circle-half fs-1 text-key mb-3"></i>
            <h3 class="fs-4 fw-bold">Cubiertas híbridas</h3>
            <p>
              Ganá potencia y robustez sin perder agilidad. Las cubiertas híbridas ofrecen excelente adherencia al terreno, brindando seguridad en cada maniobra y adaptabilidad para múltiples superficies.
            </p>
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