<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros | Forever Bikes - De ciclistas para ciclistas</title>
    <meta name="description" content="Conocé la historia detrás de Forever Bikes: una marca nacida del amor por pedalear. Desde el taller hasta la comunidad, cada bici cuenta una historia. La nuestra empezó con una idea simple: rodar distinto.">
    <link rel="shortcut icon" href="./assets/img/profile-img.jpg" type="image/x-icon">
    <!-- css Bs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- css main -->
    <link rel="stylesheet" href="./assets/styles/css/main.css">
</head>
<body class="bg-white">
    
    <?php include('./nav.php'); ?>

    <header class="header container mt-5 pb-5">
        <img src="./assets/img/banner-nosotros.png" alt="Forever Bikes Logo" class="w-100">
    </header>

    <main class="container">
        <section class="py-5">
            <div class="text-center px-2 px-md-5">
                <h2 class="fs-2 text-center text-uppercase fw-bold">QUIENES SOMOS</h2>
                <p class="fs-6">
                    Todo empezó en 2015 con una mensajera, una bici y muchas horas de pedaleo. Romina recorría la ciudad soñando con una bici más liviana, cómoda y simple. <br>Entre recorridos y averías, la mecánica se volvió una pasión, y ese amor por los detalles fue tomando forma en un taller.
                </p>
                <p class="fs-6">
                    En 2017 nace Forever Bikes, primero como un espacio de bicis personalizadas, y hoy como una comunidad ciclista que no para de crecer. <br> <strong>Diseñamos, creamos, enseñamos y rodamos</strong> .
                </p>
                <p class="fs-6">
                    Creemos en el poder de la bici para transformar vidas, por eso también somos un taller escuela, donde compartimos lo que sabemos para que cada ciclista sea libre de llegar a donde quiera.
                </p>
            </div>
        </section>
        <section class="py-0 py-md-5">
            <img src="./assets/img/banner-nosotros-2.png" alt="" class="w-100">
        </section>
        
        <section class="py-5 row">
            <h3 class="fs-2 text-center text-uppercase fw-bold mb-4">Valores de Forever Bikes </h3>
            <video 
                src="./assets/videos/forever-bikes-taller.mp4" 
                autoplay 
                muted 
                width="320px" 
                loop
                class="col-md-4 order-2 order-md-1">
            </video>
            <div class="col-md-4 order-1 order-md-2">
                <h4 class="fs-6 fw-bold">
                    # Pasión por rodar distinto
                </h4>
                <p class="fs-6 mt-1">
                    No vendemos bicis, compartimos una forma de vivir.
                </p>

                <h4 class="fs-6 fw-bold mt-3">
                    # Comunidad que pedalea unida
                </h4>
                <p class="fs-6 mt-1">
                    Cada bici Forever es parte de algo más grande: la #FamiliaForever.
                </p>

                <h4 class="fs-6 fw-bold mt-3">
                    # Simplicidad bien pensada
                </h4>
                <p class="fs-6 mt-1">
                    Menos complicaciones, más kilómetros.
                </p>

                <h4 class="fs-6 fw-bold mt-3">
                    # Compromiso con la calidad
                </h4>
                <p class="fs-6 mt-1">
                    Cada bici se arma como si fuera para nosotros.
                </p>

                <h4 class="fs-6 fw-bold mt-3">
                    # Aprendizaje constante
                </h4>
                <p class="fs-6 mt-1">
                    Creemos en compartir el saber, por eso somos también un taller escuela.
                </p>

                <h4 class="fs-6 fw-bold mt-3"> 
                    # Autonomía sobre ruedas
                </h4>
                <p class="fs-6 mt-1">
                    Una bici es libertad. Conocerla, repararla y mejorarla también.
                </p>

                <h4 class="fs-6 fw-bold mt-3"> 
                    # Diseño que acompaña
                </h4>
                <p class="fs-6 mt-1">
                    Diseñamos para vos, para tu cuerpo, para tu forma de andar.
                </p>

                <h4 class="fs-6 fw-bold mt-3">
                    # Cuidado del planeta
                </h4>
                <p class="fs-6 mt-1">
                    Elegir pedalear es también elegir un camino más consciente.
                </p>

                <h4 class="fs-6 fw-bold mt-3">
                    # Resistencia sin perder estilo
                </h4>
                <p class="fs-6 mt-1">
                    Porque una bici puede ser fuerte y hermosa a la vez.
                </p>
            </div>
            <div class="col-md-4 order-3 order-md-3 mt-3 mt-md-0">
                <img src="./assets/img/nosotros-3.png" alt="" class="h-100 object-fit-cover w-100">
            </div>
        </section>
    </main>
    
    
     <?php  
        include('./footer.html');
        ?>
    <!-- js bs -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>