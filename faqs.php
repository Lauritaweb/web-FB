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
    <title>Preguntas frecuentes | Forever Bikes</title>
    <meta name="description" content="Usamos cookies para mejorar tu experiencia en Forever Bikes. Te explicamos de forma sencilla qué son, para qué sirven y cómo podés gestionarlas.">

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
    
    
    <section class="container py-5">
        <h1 class="fs-1 fw-bold text-uppercase">PREGUNTAS FRECUENTES</h1>
        <h2 class="fs-4 fw-bold mt-5">Generales</h2>
        <div class="accordion" id="accordionGenerales">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
        aria-expanded="true" aria-controls="collapseOne">
        ¿Cómo compro una Forever Bikes personalizada?
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
      data-bs-parent="#accordionGenerales">
      <div class="accordion-body">
        En Forever Bikes diseñamos bicicletas personalizadas, por lo que la creación de cada bici expresa los usos y gustos de cada usuario. El cuadro de la bici es a medida para garantizar una postura confortable en el manejo. En el proceso de personalización podés elegir: el color de la bici, la postura de manejo, tipos de frenos y cubiertas, el equipo de transmisión. Estamos listos para acompañarte, escribinos por Whatsapp o acercate al taller para conversar y juntos hacer realidad la bici que soñás.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
        aria-expanded="false" aria-controls="collapseTwo">
        ¿Cómo programo un service para mi bicicleta?
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
      data-bs-parent="#accordionGenerales">
      <div class="accordion-body">
        Podés escribirnos por Whatsapp para agendar una visita al taller con tu bici para dejarla al service. Recordá que tenés dos opciones: ajuste y regulación o full. Por lo general el tiempo que toma realizar el service es de una semana.
      </div>
    </div>
  </div>
</div>

    <h2 class="fs-4 fw-bold mt-5">ENVIO DE BICICLETAS</h2>
    <div class="accordion mt-5" id="accordionEnvio">
  <div class="accordion-item">
    <h2 class="accordion-header" id="envioOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEnvioOne"
        aria-expanded="true" aria-controls="collapseEnvioOne">
        ¿Hacen envíos a todo el país?
      </button>
    </h2>
    <div id="collapseEnvioOne" class="accordion-collapse collapse show" aria-labelledby="envioOne"
      data-bs-parent="#accordionEnvio">
      <div class="accordion-body">
        La pasión por el ciclismo no conoce de fronteras, de Ushuaia a La Quiaca, del mar a la cordillera, donde sea, estamos listos para llevar tu Forever. Dentro del AMBA ofrecemos envíos a sucursales de OCA o Vía Cargo y entregas puerta a puerta. Si estás en otro punto del país ofrecemos envíos a sucursales de OCA/Vía Cargo.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="envioTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEnvioTwo"
        aria-expanded="false" aria-controls="collapseEnvioTwo">
        ¿Puedo retirar mi bicicleta en el taller?
      </button>
    </h2>
    <div id="collapseEnvioTwo" class="accordion-collapse collapse" aria-labelledby="envioTwo"
      data-bs-parent="#accordionEnvio">
      <div class="accordion-body">
        Sí. Si estás cerca de Villa Crespo o querés acercarte a retirar tu bici al taller, sos más que bienvenido. Tené en cuenta que si retirás tu bici en Forever contás con el servicio de bikefit dinámico para setear correctamente la postura ideal para vos. También podés enviar tu propio comisionista coordinando previamente.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="envioThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEnvioThree"
        aria-expanded="false" aria-controls="collapseEnvioThree">
        ¿En cuánto tiempo estará lista mi Forever Bikes?
      </button>
    </h2>
    <div id="collapseEnvioThree" class="accordion-collapse collapse" aria-labelledby="envioThree"
      data-bs-parent="#accordionEnvio">
      <div class="accordion-body">
        Si se trata de una bici personalizada el proceso de creación y armado de las bicis es de 3 semanas. Si realizás la compra de una bici del stock de la web estará disponible para el retiro o despacho de manera inmediata.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="envioFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEnvioFour"
        aria-expanded="false" aria-controls="collapseEnvioFour">
        ¿Cómo llega mi Forever Bikes?
      </button>
    </h2>
    <div id="collapseEnvioFour" class="accordion-collapse collapse" aria-labelledby="envioFour"
      data-bs-parent="#accordionEnvio">
      <div class="accordion-body">
        La bicicleta se envía prearmada. Cuando llegue a destino solo te restará colocar la rueda delantera, acomodar el manubrio y colocar el asiento a la altura correspondiente. También contás con el asesoramiento online del taller para asistirte en el armado y en el seteo de la postura.
      </div>
    </div>
  </div>
</div>

<h2 class="fs-4 fw-bold mt-5">SERVICIO POSVENTA</h2>
<div class="accordion" id="accordionFAQ">
  <!-- Primer Accordion Item -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        ¿Mi bicicleta Forever Bikes tiene garantía?
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionFAQ">
      <div class="accordion-body">
        Sí, nuestras bicis tienen garantía de 3 años por el cuadro y de 6 meses por los componentes. Cuando te llevas tu bici del taller te otorgamos el certificado de garantía con todos los detalles de la cobertura.
      </div>
    </div>
  </div>

  <!-- Segundo Accordion Item -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        ¿En qué consiste el service de las tres semanas?
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionFAQ">
      <div class="accordion-body">
        Tres semanas después de retirar tu bici del taller programamos un service de revisión general y gratuita de tu Forever Bikes. Este service tiene por objetivo revisar el correcto funcionamiento de los componentes y a partir de tu experiencia corroborar que el seteo de la postura sea el ideal para tu andar.
      </div>
    </div>
  </div>

  <!-- Tercer Accordion Item -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        ¿Qué otros beneficios tengo por ser usuario de una Forever Bikes?
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionFAQ">
      <div class="accordion-body">
        Tenés el 50% de descuento de por vida en todos los service mecánicos que le hagas a tu Forever. Además podés acceder a talleres de mecánica y salidas en bici exclusivas para miembros de la #FamiliaForever.
      </div>
    </div>
  </div>
</div>

        
    </section>
     

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