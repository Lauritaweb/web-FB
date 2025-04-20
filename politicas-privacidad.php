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
    
    
    <section class="container py-5">
        <h1 class="fs-1 fw-bold text-uppercase">Política de privacidad</h1>
        <h2 class="fs-4 fw-bold mt-5">RESPONSABLE</h2>
        <p class="fs-6 mt-4">
            ¿Quién es el responsable del tratamiento de tus datos? Identidad: Forever Bikes con domicilio social en Castillo 1332 - Ciudad Autonoma de Buenos Aires, y con número de identificación fiscal 27-31175318-0, email delegado protección de datos: info@foreverbikes.com.ar
        </p>
        <h2 class="fs-4 fw-bold">FINALIDADES</h2>
        <p class="fs-6 mt-4">
            Los datos facilitados serán incorporados a los ficheros de datos de Forever Bikes. En cumplimiento de lo dispuesto en materia de Protección de Datos, así como en cualquier ley nacional que resulte de aplicación, le informamos de que en Forever Bikes tratamos los datos personales que nos facilitas para las siguientes finalidades: Gestionar el proceso de compra de productos en nuestra página web www.foreverbikes.com.ar: recabamos su información personal para gestionar tus compras, pedidos o solicitudes, llevando a cabo las labores administrativas y comerciales necesarias para garantizar la preparación, cobro y entrega de los productos, así como el servicio preventa y postventa que pueda ser necesario. Cumplimiento de las obligaciones legales: Cesión de datos a organismos y autoridades públicas (administrativas o judiciales), siempre y cuando sean requeridos de conformidad con las disposiciones legales y reglamentarias. Tratamiento de los datos para cumplimiento de las obligaciones de carácter legal establecidas en la legislación argentina, como pueden ser la elaboración de nuestra contabilidad e impuestos. Envío de comunicaciones comerciales sobre los productos de Forever Bikes (correos electrónicos, llamadas telefónicas, SMS, notificaciones PUSH, correo ordinario, etc.). Forever Bikes elabora perfiles de usuario en base a la información obtenida de fuentes internas y externas con la finalidad de mejorar su experiencia de usuario y poder remitirle publicidad personalizada ofreciéndole productos, promociones y servicios de Forever Bikes en base a su perfil y comportamiento de compra. Prevención de abusos y fraudes (actividades fraudulentas, ataques de denegación de servicios, entre otros).
        </p>
        <h2 class="fs-4 fw-bold text-uppercase">¿Cómo recabamos tu información?</h2>
        <p class="fs-6 mt-4">
            Información que nos facilitas: recabamos información personal que tú nos facilitas a través de nuestra página web www.foreverbikes.com.ar, a través de correo electrónico, formularios de contacto y otros canales de comunicación. Información que recabamos de tus visitas a nuestra web: recogemos y almacenamos información personal limitada de todos aquellos usuarios que visitan nuestra página web. Esta información se recaba a través de cookies, para más información consulta la política de cookies en nuestra página web. Redes sociales: La información que recabamos a través de redes sociales incluye información personal que se encuentra disponible online y es visible públicamente.
        </p>
        <h2 class="fs-4 fw-bold">PLAZO DE CONSERVACIÓN DE LOS DATOS</h2>
        <p class="fs-6 mt-4">
            ¿Por cuánto tiempo conservamos tus datos personales? Diferenciamos dos tipos de información para llevar a cabo nuestra política de retención y cancelación de datos: Información contable y fiscal: derivada de la relación entre Forever Bikes y el usuario se conservará durante 2 años para cumplimiento de la normativa fiscal. Relación comercial del cliente con Forever Bikes: la información relacionada con la actividad y su portal web se conservará y tratará de forma indefinida, hasta que el usuario solicite su cancelación o manifieste su oposición al tratamiento de datos, en cuyo caso los datos serán bloqueados y conservados durante 2 años a los efectos de demostrar el cumplimiento en relación a sus obligaciones respecto de la normativa de protección de datos, sociedad de la información y publicidad.
        </p>
        <h2 class="fs-4 fw-bold">LEGITIMACIÓN</h2>
        <p class="fs-6 mt-4">
            Legitimación para el tratamiento de tus datos personales. La base legal para el tratamiento de tus datos personales correspondientes a cada una de las finalidades incluidas en el apartado FINALIDADES son: La ejecución de un contrato entre el usuario y Forever Bikes en relación con la compra de productos. Consentimiento expreso otorgado a Forever Bikes en el momento de recogida de tus datos personales. Consentimiento expreso otorgado a Forever Bikes en el momento de recogida de tus datos personales en relación con la elaboración de perfiles basados en fuentes externas y la satisfacción de un interés legítimo perseguido por Forever Bikes en relación con la elaboración de perfiles basados en fuentes internas.
        </p>
        <h2 class="fs-4 fw-bold">DESTINATARIOS</h2>
        <p class="fs-6 mt-4">
            Tus datos personales no serán cedidos a ningún tercero, excepto a aquellos terceros para los cuales resulte necesaria su intervención para la correcta gestión de la prestación del servicio. Al aceptar esta política de privacidad, otorgas tu consentimiento expreso a Forever Bikes para realizar los tratamientos, comunicaciones, cesiones y transferencia de sus datos personales aquí indicados. El usuario tiene el derecho a retirar el consentimiento otorgado para los tratamientos y cesiones de datos aquí descritas en cualquier momento, sin que ello afecte a la licitud del tratamiento basado en el consentimiento previo a su retirada. Si deseas ejercer cualquiera de tus derechos puedes enviarnos una comunicación escrita a los datos de contacto arriba detallados. La solicitud de ejercicio de cualesquiera de tus derechos deberá ir acompañada de una copia de documento oficial que te identifique (documento de identidad, carnet de conducir o pasaporte).
        </p>
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