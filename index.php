<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forever Bikes | Viví la pasión por el ciclismo</title>
    <meta name="description" content="Descubrí Forever Bikes, la comunidad de ciclistas que vive la pasión por las dos ruedas. Encontrá bicicletas, accesorios y service con beneficios exclusivos.">
    <link rel="shortcut icon" href="./assets/img/profile-img.jpg" type="image/x-icon">
    <!-- css Bs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- css main -->
    <link rel="stylesheet" href="./assets/styles/css/main.css">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-314617588"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-314617588');
    </script>
</head>
<body class="bg-white">

    <?php include('./nav.php'); ?>

    <header class="header container mt-3 border-bottom pb-5">
        <img src="./assets/img/header-forever-bike.png" alt="Forever Bikes Logo">
    </header>

    <main class="container">
        <section class="our-bikes py-5 border-bottom" id="our-bikes">
            <h1 class="fs-1 text-uppercase text-center fw-bold">Nuestras bicis</h1>
            <div class="row mt-5">
                <article class="col-md-4 mb-5 mb-md-0 border-end border-bottom p-0">
                    <a href="./productos/bicis/bicis-ruta.php">
                        <img src="./assets/img/forever-ruta.png" alt="" class="w-100">
                        <h2 class="fs-2 text-uppercase mt-3">Ruta</h2>
                    </a>
                    <ul>
                        <li>
                            <a href="https://www.foreverbikes.com.ar/detail.php?id=BICIFB004">
                                Sport
                            </a>
                        </li>
                        <li>
                            <a href="https://www.foreverbikes.com.ar/detail.php?id=BICIFB006">
                                Aero
                            </a>
                        </li>
                        <li>
                            <a href="https://www.foreverbikes.com.ar/detail.php?id=BICIFB018">
                                Lite Aluminio
                            </a>
                        </li>
                    </ul>
                </article>
                <!-- end col4 -->
                <article class="col-md-4 mb-5 mb-md-0 border-end border-bottom p-0">
                    <a href="./productos/bicis/bicis-urbanas.html">
                        <img src="./assets/img/forever-urbanas.png" alt="" class="w-100">
                        <h2 class="fs-2 text-uppercase mt-3">Urbanas</h2>
                    </a>
                    <ul>
                        <li>
                            <a href="https://www.foreverbikes.com.ar/detail.php?id=BICIFB020">
                                Chill
                            </a>
                        </li>
                        <li>
                            <a href="https://www.foreverbikes.com.ar/detail.php?id=BICIFB013">
                               Classic
                            </a>
                        </li>
                        <li>
                            <a href="https://www.foreverbikes.com.ar/detail.php?id=BICIFB004">
                                Sport Aluminio
                            </a>
                        </li>
                    </ul>
                </article>
                <!-- end col4 -->
                <article class="col-md-4 mb-5 mb-md-0 border-end border-bottom p-0">
                    <a href="./productos/bicis/bicis-todo-terreno.html">
                        <img src="./assets/img/forever-todo-terreno.png" alt="" class="w-100">
                        <h2 class="fs-2 text-uppercase mt-3">Todo terreno</h2>
                    </a>
                    <ul>
                        <li>
                            <a href="https://www.foreverbikes.com.ar/detail.php?id=BICIFB014">
                                Storm
                            </a>
                        </li>
                        <li>
                            <a href="https://www.foreverbikes.com.ar/detail.php?id=BICIFB022T">
                                Traveler
                            </a>
                        </li>
                        <li>
                            <a href="https://www.foreverbikes.com.ar/detail.php?id=BICIFB016">
                                Traveler 1.3
                            </a>
                        </li>
                    </ul>
                </article>
            </div>
        </section>
        <section class="collage py-5 border-bottom">
            <h2 class="fs-2 text-center text-uppercase">Pedaleá más lejos y disfrutá el camino</h2>
            <img src="./assets/img/forever-bikes-fotos-puerto-madero.png" alt="" class="w-100">
        </section>
        <section class="categories py-5 border-top border-bottom">
            <h2 class="fs-2 text-uppercase text-center fw-bold">Categorías</h2>
            <div class="row row-cols-md-5 row-cols-sm-2 mt-5">
                <figure class="bg-white d-flex flex-column justify-content-center align-items-center">
                    <a href="./productos/accesorios/index.php">
                        <img src="./assets/img/accesories.png" alt="">
                        <figcaption class="fs-5 text-center">Accesorios</figcaption>
                    </a>
                </figure>
                <figure class="bg-white d-flex flex-column justify-content-center align-items-center">
                    <a href="./productos/componentes/index.php">
                        <img src="./assets/img/components.png" alt="">
                        <figcaption class="fs-5 text-center">Componentes</figcaption>
                    </a>
                </figure>
                <figure class="bg-white d-flex flex-column justify-content-center align-items-center">
                    <a href="./productos/bicis/index.php">
                        <img src="./assets/img/bikes.png" alt="">
                        <figcaption class="fs-5 text-center">Bicicletas</figcaption>
                    </a>
                </figure>
                <figure class="bg-white d-flex flex-column justify-content-center align-items-center">
                    <a href="./productos/componentes/frenos.php">
                        <img src="./assets/img/brakes.png" alt="">
                        <figcaption class="fs-5 text-center">Frenos</figcaption>
                    </a>
                </figure>
                <figure class="bg-white d-flex flex-column justify-content-center align-items-center">
                    <a href="./productos/indumentaria/index.php">
                        <img src="./assets/img/clothing.png" alt="">
                        <h3 class="fs-5 text-center">Indumentaria</h3>
                    </a>
                </figure>
            </div>
        </section>
        <section class="story-telling py-5 border-bottom" >
            <div class="row flex-column-reverse flex-md-row">
                <article class="col-md-6 d-flex align-items-center justify-content-center">
                    <p class="fs-5 lh-2 text-center mt-3 mt-md-0">
                        Cada pedaleada es una historia nueva. En <strong>Forever Bikes</strong>, tenemos la bici perfecta para que vivas la aventura a tu manera. Ya sea en la ciudad, la montaña o la ruta, encontrá el modelo ideal y llevá tu pasión al próximo nivel.
                    </p>
                </article>
                <article class="col-md-6">
                    <img src="./assets/img/forever-bikes-mujer-pedaleando.png" alt="" class="w-100">
                </article>
            </div>
        </section>
        <section class="services py-5 border-bottom">
            <h2 class="fs-2 text-center text-uppercase fw-bold">Services</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 mt-5">
                <figure class="border-bottom border-end">
                    <a href="./services.php#posventa">
                        <img src="./assets/img/icon-post-venta.svg" alt="" class="d-block mx-auto">
                        <figcaption class="fs-5 fw-bold text-center text-uppercase mt-4">Post venta</figcaption>
                        <p class="fs-6 fw-light lh-sm text-center">
                            Después de la compra, te seguimos cuidando con nuestro service post venta. 
                        </p>
                    </a>
                </figure>
                <figure class="border-bottom border-end">
                   <a href="./services.php#service">
                    <img src="./assets/img/icon-service.svg" alt="" class="d-block mx-auto">
                        <figcaption class="fs-5 fw-bold text-center text-uppercase mt-4">Service</figcaption>
                        <p class="fs-6 fw-light lh-sm text-center">
                            Traé tu bici al service, todas son bienvenidas Mantenela siempre al 100.
                        </p>
                   </a>
                </figure>
                <figure class="border-bottom border-end">
                    <a href="./services.php#restyling">
                        <img src="./assets/img/icon-restyling.svg" alt="" class="d-block mx-auto">
                        <figcaption class="fs-5 fw-bold text-center text-uppercase mt-4">Restyling</figcaption>
                        <p class="fs-6 fw-light lh-sm text-center">
                            Renová tu bici con nuestro restyling. Dejála como nueva y andá con estilo.
                        </p>
                    </a>
                </figure>
                <figure class="border-bottom border-end">
                    <a href="./services.php#cursos">
                        <img src="./assets/img/icon-courses.svg" alt="" class="d-block mx-auto">
                        <figcaption class="fs-5 fw-bold text-center text-uppercase mt-4">cursos</figcaption>
                        <p class="fs-6 fw-light lh-sm text-center">
                            Sumate a nuestros cursos y aprende a cuidar y mejorar tu bici como un pro.
                        </p>
                    </a>
                </figure>
            </div>
        </section>
        <section class="story-telling-2 py-5 border-bottom" id="forever-comunity">
            <div class="row row-cols-1 row-cols-md-2">
                <div>
                    <img src="./assets/img/forever-comunidad.png" alt="" class="w-100">
                </div>
                <article class="d-flex flex-column justify-content-center mt-3 mt-md-0">
                    <h2 class="fs-2 fw-bold">
                        #FamiliaForever <br>
                        Más que bicis, una comunidad
                    </h2>
                    <p class="fs-6 lh-sm">
                        En Forever Bikes creemos que el ciclismo es mucho más que rodar: es compartir experiencias, descubrir nuevos caminos y crecer juntos. Por eso, creamos la <strong>#FamiliaForever</strong>, una comunidad pensada para quienes viven la pasión por las dos ruedas.
                    </p>
                    <p class="fs-6 lh-sm">
                        Si sos parte de la familia, además de disfrutar un <strong>50% de descuento en service y cursos de mecánica</strong>, también te sumás a nuestras salidas grupales, donde cada pedaleada se convierte en una nueva aventura. 
                    </p>
                    <p class="fs-6 lh-sm">
                        Rodamos juntos. Aprendemos juntos. Crecemos juntos. Porque en Forever Bikes, no solo vendemos bicis… <strong> construimos comunidad</strong>. 
                    </p>
                    <p class="fw-bold fs-6">
                        Sumate y viví la experiencia #FamiliaForever.
                    </p>
                </article>
            </div>
        </section>
        <section class="py-5 banner-forever">
            <img src="./assets/img/banner-forever.png" alt="" class="w-100">
        </section>

        <?php  
        include('./footer.html');
        ?>

        <!-- js bs -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>