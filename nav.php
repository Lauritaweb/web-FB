<?php
require 'vendor/autoload.php';

// Cargar variables de entorno desde .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Obtener la URL base de las variables de entorno
$url_base = $_ENV['APP_URL'];
?>
<div class="marquee bg-black text-white text-center mb-2">
        <p>
            <i class="bi bi-bicycle"></i>
            de ciclistas para ciclistas...
        </p>
    </div>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg  position-relative pt-3 pt-md-5">
        <div class="container">
      
          <!-- Botón Hamburguesa -->
          <button class="navbar-toggler me-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <!-- Logo Centrado Absoluto -->
          <a class="navbar-brand position-absolute top-50 start-50 translate-middle" href="https://foreverbikes.com.ar/">
            <img src="https://foreverbikes.com.ar/assets/img/logo-forever-bikes.svg" alt="Forever Bikes" >
          </a>
      
          <!-- Menú principal -->
          <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      
            <!-- Links a la izquierda -->
            <ul class="navbar-nav me-auto">
              <li class="nav-item dropdown position-static">
                <a class="nav-link dropdown-toggle" href="#" id="megaMenuLink" data-bs-toggle="dropdown">
                  Bicicletas
                </a>
                <div class="dropdown-menu w-100 mt-0 p-0 p-md-4 border-0 shadow-lg">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-2">
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/bicis/bicis-urbanas.php">Urbanas</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/bicis/bicis-ruta.php">Ruta</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/bicis/bicis-todo-terreno.php">Todo terreno</a></li>
                        </ul>
                      </div>

                      <div class="col-md-2">
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/bicis/mi-primera-forever.php">Mi primera Forever</a></li>
                          <li><a class="dropdown-item text-key" href="<?= $url_base ?>/productos/bicis/index.php">Ver todas</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown position-static">
                <a class="nav-link dropdown-toggle" href="#" id="megaMenuLink" data-bs-toggle="dropdown">
                  Componentes
                </a>
                <div class="dropdown-menu w-100 mt-0 p-4 border-0 shadow-lg">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-2">
                        <h6 class="fw-bold">Componentes</h6>
                        <ul class="list-unstyled">
                          
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/asientos-velas-collares.php">Asientos, velas y collares</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/cables-fundas-ductos.php">Cables, fundas y ductos</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/cadenas.php">Cadenas</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/cajas-pedaleras.php">Cajas pedaleras</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/camaras.php">Cámaras</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/cambios.php">Cambios</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/cuadros.php">Cuadros y horquillas</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/cubiertas.php">Cubiertas</a></li>
                        </ul>
                      </div>
                      <div class="col-md-2">
                        <h6 class="fw-bold">&nbsp;</h6>
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/frenos.php">Frenos</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/juegos-direccion.php">Juegos de dirección</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/manubrios.php">Manubrios</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/mazas.php">Mazas</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/pedales-calas.php">Pedales y calas</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/pinones.php">Piñones</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/platos-palancas.php">Platos y palancas</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/puños-grips.php">Puños y grips</a></li>
                        </ul>
                      </div>
                      <div class="col-md-2">
                        <h6 class="fw-bold">&nbsp;</h6>
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/ruedas-componentes.php">Ruedas, Aros y Rayos                          </a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/stems.php">Stems</a></li>
                          <li><a class="dropdown-item text-key" href="<?= $url_base ?>/productos/componentes/index.php">Ver todos los componentes</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown position-static">
                <a class="nav-link dropdown-toggle" href="#" id="megaMenuLink" data-bs-toggle="dropdown">
                  Accesorios
                </a>
                <div class="dropdown-menu w-100 mt-0 p-4 border-0 shadow-lg">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-2">
                        <h6 class="fw-bold">Accesorios</h6>
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/bolsos.php">Bolsos y alforjas</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/caramanolas.php">Caramañolas</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/cascos.php">Cascos</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/ciclocomputadores.php">Ciclocomputadores</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/infladores.php">Infladores</a></li>
                        </ul>
                      </div>
                      
                      <div class="col-md-2">
                        <h6 class="fw-bold">&nbsp;</h6>
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/lingas.php">Lingas</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/luces.php">Luces</a></li>                                                    
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/otros.php">Otros accesorios</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/portaequipajes.php">Portaequipajes</a></li>
                          <li><a class="dropdown-item text-key" href="<?= $url_base ?>/productos/accesorios/index.php">Ver todos los accesorios</a></li>
                        </ul>
                      </div>                      
                      
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown position-static d-none">
                <a class="nav-link dropdown-toggle" href="#" id="megaMenuLink" data-bs-toggle="dropdown">
                  Indumentaria
                </a>
                <div class="dropdown-menu w-100 mt-0 p-4 border-0 shadow-lg">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-2">
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item text-key" href="<?= $url_base ?>/productos/indumentaria/index.php">Ver todos</a></li>
                        </ul>
                      </div>
                    
                    </div>
                  </div>
                </div>
              </li>
              
              <li class="nav-item"><a class="nav-link" href="<?= $url_base ?>/productos/indumentaria/index.php">INDUMENTARIA</a></li>
              
              
<!-- 
              <li class="nav-item"><a class="nav-link" href="<?= $url_base ?>/about-foreverbikes.php">SOMOS FOREVER</a></li>
              <li class="nav-item"><a class="nav-link" href="<?= $url_base ?>/index.php#forever-comunity">COMUNIDAD</a></li> -->
            </ul>
      
            <!-- Iconos a la derecha -->
            <div class="d-flex gap-3 align-items-center">
              <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown position-static">
                <a class="nav-link dropdown-toggle" href="#" id="megaMenuLink" data-bs-toggle="dropdown">
                    SERVICIOS
                    </a>
                <div class="dropdown-menu w-100 mt-0 p-4 border-0 shadow-lg">
                  <div class="container">
                    <div class="row">
                      <div class="col">
                            <ul class="list-unstyled">
                                <li><a class="dropdown-item" href="<?= $url_base ?>/services.php#postventa">Post venta</a></li>
                                <li><a class="dropdown-item" href="<?= $url_base ?>/services.php#service">Service mecánico</a></li>
                                <li><a class="dropdown-item" href="<?= $url_base ?>/services.php#restyling">Restyling</a></li>
                                <li><a class="dropdown-item" href="<?= $url_base ?>/services.php#cursos">Cursos</a></li>
                            </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
                <li class="nav-item dropdown position-static">
                <a class="nav-link dropdown-toggle" href="#" id="megaMenuLink" data-bs-toggle="dropdown">
                  Forever
                </a>
                <div class="dropdown-menu w-100 mt-0 p-4 border-0 shadow-lg">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-2">
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item" href="<?= $url_base ?>/about-foreverbikes.php">Somos Forever</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/index.php#forever-comunity">Comunidad Forever</a></li>
                        </ul>
                      </div>
                    
                    </div>
                  </div>
                </div>
              </li>
              </ul>
              <a href="<?= $url_base ?>/checkout.php" class="nav-link border-end pe-3">
                <span id="cart-count"  style="font-size: 0.7rem;">
                  
                </span>
                <i class="bi bi-cart"></i>
              </a>
              <a href="https://www.instagram.com/foreverbikesargentina/" class="nav-link"><i class="bi bi-instagram"></i></a>
              <a href="https://www.youtube.com/@foreverbikesargentina9001" class="nav-link"><i class="bi bi-youtube"></i></a>
              <a href="https://www.facebook.com/Foreverbikesarg" class="nav-link"><i class="bi bi-facebook"></i></a>
              <a href="https://www.tiktok.com/@foreverbikesargentina" class="nav-link"><i class="bi bi-tiktok"></i></a>
            </div>
          </div>
        </div>
      </nav>
    <!-- end navbar -->

<script>

document.addEventListener("DOMContentLoaded", function () {
    actualizarContadorCarrito();
});

function actualizarContadorCarrito() {
    fetch('<?= $url_base ?>/get_cart_count.php')
        .then(res => res.json())
        .then(data => {
          if (data.count > 0) {
            document.getElementById('cart-count').textContent = data.count;
            document.getElementById('cart-count').classList.add('badge');
            document.getElementById('cart-count').classList.add('rounded-pill');
            document.getElementById('cart-count').classList.add('bg-danger');
            document.getElementById('cart-count').classList.add('cart-badge');
          }
        })
        .catch(error => {
            console.error('Error al obtener el contador del carrito:', error);
        });
}
</script>
