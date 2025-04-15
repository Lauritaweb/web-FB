<?php
session_start();
require '../../vendor/autoload.php';

use App\Models\Bike;

$bikeModel = new Bike();
$list = $bikeModel->getProductsByCategory(1);
$idSubCategory=1;
//var_dump($list);
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
    <div class="marquee bg-black text-white text-center">
        <p>
            <i class="bi bi-bicycle"></i>
            de ciclistas para ciclistas...
        </p>
    </div>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg position-relative mt-5">
        <div class="container">
            
            <a class="navbar-brand position-absolute start-50 translate-middle-x " href="../../index.html">
                <img src="../../assets/img/logo-forever-bikes.svg" alt="Forever Bikes" >
            </a>
    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link ps-0" href="#our-bikes">NUESTRAS BICIS </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">SOMOS FOREVER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">COMUNIDAD FOREVER</a>
                    </li>
                </ul>
    
                <div class="d-flex gap-3">
                    <a href="#" class="nav-link border-end px-3">
                        <i class="bi bi-cart"></i>
                    </a>
                    <a href="https://www.instagram.com/foreverbikesargentina" target="_blank" class="nav-link">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/@foreverbikesargentina9001" target="_blank" class="nav-link">
                        <i class="bi bi-youtube"></i>
                    </a>
                    <a href="https://www.tiktok.com/@foreverbikesargentina" target="_blank" class="nav-link">
                        <i class="bi bi-tiktok"></i>
                    </a>
                </div>
    
            </div>
        </div>
    </nav>
    <!-- end navbar -->

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
      
    <!-- Shop Start -->
    <div class="container-fluid pt-0 pt-md-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-2 col-md-12 d-none d-md-block">

                <!-- Price Start -->
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Filtrar por precios</h5>
                <form class="filter-form" data-filter="price">
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start mb-3">
                        <input type="checkbox" class="custom-control-input price-filter" checked id="price-all" value="all">
                        <label class="custom-control-label ms-2" for="price-all">Todos los precios</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start mb-3">
                        <input type="checkbox" class="custom-control-input price-filter" id="price-1" value="0-100">
                        <label class="custom-control-label ms-2" for="price-1">$0 - $100</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start mb-3">
                        <input type="checkbox" class="custom-control-input price-filter" id="price-2" value="100-200">
                        <label class="custom-control-label ms-2" for="price-2">$100 - $200</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start mb-3">
                        <input type="checkbox" class="custom-control-input price-filter" id="price-3" value="200-300">
                        <label class="custom-control-label ms-2" for="price-3">$200 - $300</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start mb-3">
                        <input type="checkbox" class="custom-control-input price-filter" id="price-4" value="300-400">
                        <label class="custom-control-label ms-2" for="price-4">$300 - $400</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start">
                        <input type="checkbox" class="custom-control-input price-filter" id="price-5" value="400-500">
                        <label class="custom-control-label ms-2" for="price-5">$400 - $500</label>
                    </div>
                </form>
            </div>
            <!-- Price End -->
                
                <!-- Color Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filtrar por color</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="color-all">
                            <label class="custom-control-label ms-2" for="price-all">Todos los colores</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-1">
                            <label class="custom-control-label ms-2" for="color-1">Negro</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-2">
                            <label class="custom-control-label ms-2" for="color-2">Blanco</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-3">
                            <label class="custom-control-label ms-2" for="color-3">Rojo</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-4">
                            <label class="custom-control-label ms-2" for="color-4">Azul</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start">
                            <input type="checkbox" class="custom-control-input" id="color-5">
                            <label class="custom-control-label ms-2" for="color-5">Verde</label>
                        </div>
                    </form>
                </div>
                <!-- Color End -->

                <!-- Size Start -->
                <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Filtrar por tamaño</h5>
                    <form id="size-filters"></form>
                </div>
                <!-- Size End -->


            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <main class="col-lg-10 col-md-12">
                <div class="row">
                    <div class="d-inline-flex">
                        <p class="m-0 me-1 "><a href="../../index.html" class="text-key ">Home</a></p>
                        <p class="m-0 me-1 "><a href="./index.html" class="text-key fw-bold ms-2">Nuestras bicis</a></p>
                        <p class="m-0"> > Bicis de ruta</p>
                    </div>
                    <div class="col-12 pb-1 mt-3">
                        <div class="d-block d-md-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Buscar por nombre">
                                    <button class="btn btn-light rounded-end border">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="dropdown ml-4 mt-3 mt-md-0">
                                <button class="btn border dropdown-toggle w-100 text-start" type="button" id="triggerId" data-bs-toggle="dropdown" aria-expanded="false">
                                    Ordenar productos
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <li><a class="dropdown-item" href="#">Menor precio</a></li>
                                    <li><a class="dropdown-item" href="#">Mayor precio</a></li>
                                    <li><a class="dropdown-item" href="#">A-Z (Nombre)</a></li>
                                    <li><a class="dropdown-item" href="#">Z-A (Nombre)</a></li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    <div id="product-list">

                    </div>                    
                    
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center mb-3">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </main>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

    <footer class="py-5 border-bottom container border-top mt-5">
        <div class="row row-cols-1 row-cols-md-4 pb-5">
            <article>
                <h3 class="fs-4 fw-bold">
                    TIENDA
                </h3>
                <ul>
                    <li>
                        <a href="#">
                            Bicicletas
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Componentes
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Accesorios
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Indumentaria
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Taller
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Cursos
                        </a>
                    </li>
                </ul>
            </article>
            <article>
                <h3 class="fs-4 fw-bold">
                    INFORMACIÓN
                </h3>
                <ul>
                    <li>
                        <a href="#">
                            Nuestras bicis
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Quiénes somos
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Familia Forever
                        </a>
                    </li>
                </ul>
            </article>
            <article>
                <h3 class="fs-4 fw-bold">
                    LEGALES
                </h3>
                <ul>
                    <li>
                        <a href="#">
                            Política de privacidad
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Política de cookies
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Términos y condiciones
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Preguntas frecuentes
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Arrepentimiento
                        </a>
                    </li>
                </ul>
            </article>
            <article class="payments">
                <h3 class="fs-4 fw-bold">
                    MEDIOS DE PAGO
                </h3>
                <p class="fs-small fw-regular">
                    Tarjetas de Débito
                </p>
                <img src="../../assets/img/tarjetas-de-debito.png" alt="">
                <p class="fs-small fw-regular">
                    Tarjetas de Crédito
                </p>
                <img src="../../assets/img/tarjetas-de-credito.png" alt="">
                <p class="fs-small fw-regular">
                    Puntos de Pago
                </p>
                <img src="../../assets/img/puntos-de-pago.png" alt="">
            </article>             
        </div>
        <div class="py-5 border-top">
            <img src="../../assets/img/logo-forever-bikes.svg" alt="" class="d-block mx-auto">
            <p class="lh-sm fs-6 text-center">
                @foreverbikesargentina <br>
                Castillo 1332 - Villa Crespo- CABA <br>
                © 2025 Forever Bikes. Todos los derechos reservados.
            </p>
        </div>
    </footer>


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- js bs -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/easing/easing.min.js"></script>
    <script src="../../assets/vendor/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript 
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>File -->

    <!-- Javascript -->
    <script src="../../assets/js/main.js"></script>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    console.log("llamando");
    $.getJSON('get_filters.php', function (data) {
        renderFilters(data.colors, '#color-filters', 'color');
        renderFilters(data.sizes, '#size-filters', 'size');
    });

    function renderFilters(items, containerId, prefix) {
        let html = `
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start mb-3">
                <input type="checkbox" class="custom-control-input" checked id="${prefix}-all">
                <label class="custom-control-label ms-2" for="${prefix}-all">Todos</label>
            </div>
        `;

        items.forEach(item => {            
            html += `
                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start mb-3">
                    <input type="checkbox" class="custom-control-input" id="${prefix}-${item.id}" value="${item.id}">
                    <label class="custom-control-label ms-2" for="${prefix}-${item.id}">${item.description}</label>
                </div>
            `;
        });

        $(containerId).html(html);
    }
});
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function aplicarFiltros() {
  // let category = $('#filter-category').val();
  let category = <?= json_encode($idSubCategory) ?>;
  let sizes = $('#filter-size').val();
  let colors = $('#filter-color').val();


  $.ajax({
    url: 'filter_products.php',
    type: 'POST',
    dataType: 'json',
    data: {
      category: category,
      sizes: sizes,
      colors: colors
    },
    success: function (products) {
      let html = '';
      if (products.length > 0) {
        products.forEach(function (product) {
          html += `
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="../../assets/media/image/${product.image}" alt="${product.name}">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">${product.name}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$${product.price}</h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-dark me-1"></i>Ver detalles</a>
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-dark me-1"></i>Agregar al carrito</a>
                            </div>
                        </div>
                </div>          
          `;
        });
      } else {
        html = '<p>No se encontraron productos.</p>';
      }
      $('#product-list').html(html);
    }
  });
}

// Ejecutar al cargar la página
$(document).ready(function () {
  aplicarFiltros();

  // Ejecutar también cuando se hace clic en el botón
  $('#apply-filters').on('click', function () {
    aplicarFiltros();
  });
});
</script>




</body>

</html>