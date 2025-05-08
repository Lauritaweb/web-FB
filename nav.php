<?php
//$url_base = 'https://dodgerblue-whale-838164.hostingersite.com';
 $url_base = 'https://www.foreverbikes.com.ar';
?>
<div class="marquee bg-black text-white text-center mb-2">
        <p>
            <i class="bi bi-bicycle"></i>
            de ciclistas para ciclistas...
        </p>
    </div>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg  position-relative pt-5">
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
                  PRODUCTOS
                </a>
                <div class="dropdown-menu w-100 mt-0 p-4 border-0 shadow-lg">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-2">
                        <h6 class="fw-bold">Bicis</h6>
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/bicis/bicis-urbanas.php">Urbanas</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/bicis/bicis-ruta.php">Ruta</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/bicis/bicis-todo-terreno.php">Todo terreno</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/bicis/mi-primera-forever.php">Mi primera Forever</a></li>
                          <li><a class="dropdown-item text-key" href="<?= $url_base ?>/productos/bicis/index.php">Ver todas</a></li>
                        </ul>
                      </div>
                      <div class="col-md-2">
                        <h6 class="fw-bold">Componentes</h6>
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/asientos.php">Asientos</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/frenos.php">Frenos</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/cuadros.php">Cuadros</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/stems.php">Stems</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/manubrios.php">Manubrios</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/ruedas-componentes.php">Ruedas y componentes</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/componentes/transmision.php">Trasmisión</a></li>
                          <li><a class="dropdown-item text-key" href="<?= $url_base ?>/productos/componentes/index.php">Ver todos</a></li>
                        </ul>
                      </div>
                      <div class="col-md-2">
                        <h6 class="fw-bold">Accesorios</h6>
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/cascos.php">Cascos</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/bolsos.php">Bolsos</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/luces.php">Luces</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/ciclocomputadores.php">Ciclocomputadores</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/herramientas.php">Herramientas</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/infladores.php">Infladores</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/lingas.php">Lingas</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/punos-cintas.php">Puños / Cintas</a></li>
                          <li><a class="dropdown-item" href="<?= $url_base ?>/productos/accesorios/otros.php">Otros</a></li>
                          <li><a class="dropdown-item text-key" href="<?= $url_base ?>/productos/accesorios/index.php">Ver todos</a></li>
                        </ul>
                      </div>
                      <div class="col-md-2">
                        <h6 class="fw-bold">Indumentaria</h6>
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item text-key" href="<?= $url_base ?>/productos/indumentaria/index.php">Ver todos</a></li>
                        </ul>
                      </div>
                      <!-- <div class="col-md-2">
                        <h6 class="fw-bold">Servicios</h6>
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item text-key" href="<?= $url_base ?>/productos/services/index.php">Ver todos</a></li>
                        </ul>
                      </div> 
                      <div class="col-md-2">
                        <h6 class="fw-bold">Cursos</h6>
                        <ul class="list-unstyled">
                          <li><a class="dropdown-item text-key" href="<?= $url_base ?>/productos/cursos/index.php">Ver todos</a></li>
                        </ul>
                      </div>-->
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown position-static">
                <a class="nav-link dropdown-toggle" href="#" id="megaMenuLink" data-bs-toggle="dropdown">
                    SERVICIOS
                    </a>
                <div class="dropdown-menu w-100 mt-0 p-4 border-0 shadow-lg">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-2">
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
              <li class="nav-item"><a class="nav-link" href="<?= $url_base ?>/index.php#our-bikes">NUESTRAS BICIS</a></li>
              <li class="nav-item"><a class="nav-link" href="<?= $url_base ?>/about-foreverbikes.php">SOMOS FOREVER</a></li>
              <li class="nav-item"><a class="nav-link" href="<?= $url_base ?>/index.php#forever-comunity">COMUNIDAD</a></li>
            </ul>
      
            <!-- Iconos a la derecha -->
            <div class="d-flex gap-3 align-items-center">
              <a href="<?= $url_base ?>/checkout.php" class="nav-link border-end pe-3">
                <!-- <span id="cart-count" class="badge rounded-pill bg-danger cart-badge" style="font-size: 0.7rem;">
                  0
                </span> -->
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
