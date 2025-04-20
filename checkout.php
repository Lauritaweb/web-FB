<?php
session_start();

$carrito = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
//var_dump($carrito);

$subtotal = 0;
$envio = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
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

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./assets/vendor/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

</head>

<body class="bg-white">
    <?php include('nav.php'); ?>
    
   

    <!-- Page Header Start -->
    <header class="container-fluid header bg-two mb-5 mt-5">
        <div class="d-flex flex-column align-items-center justify-content-center"></div>
    </header>
    <!-- Page Header End -->


    <div class="d-inline-flex container-fluid px-xl-5">
        <p class="m-0"><a href="./index.html" class="fw-bold text-dark">Home</a></p>
        <p class="m-0 px-2">-</p>
        <p class="m-0">Checkout</p>
    </div>

    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <form id="checkout-form" method="POST" >
                <div class="col-lg-8">
                    <div class="mb-4">
                        <h4 class="font-weight-semi-bold mb-4">Datos de facturación</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <span class="text-danger">*</span>
                                <label>Nombre</label>
                                <input class="form-control" type="text" name="nombre" placeholder="Laura" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <span class="text-danger">*</span>
                                <label>Apellido</label>
                                <input class="form-control" type="text" name="apellido" placeholder="Avalle" required>
                            </div>
                            <div class="col-md-6 form-group mt-2">
                                <span class="text-danger">*</span>
                                <label>E-mail</label>
                                <input class="form-control" type="email" name="email" placeholder="ejemplo@email.com" required>
                            </div>
                            <div class="col-md-6 form-group mt-2">
                                <span class="text-danger">*</span>
                                <label>Celuar</label>
                                <input class="form-control" type="text" name="telefono" placeholder="+11 578413" required>
                            </div>
                            <div class="col-md-6 form-group mt-2">
                                <span class="text-danger">*</span>
                                <label>Dirección</label>
                                <input class="form-control" type="text" name="direccion" placeholder="Calle 45" required>
                            </div>
                            <div class="col-md-6 form-group mt-2">
                                <span class="text-danger">*</span>
                                <label>Provincia</label>
                                <select class="form-select" ame="provincia" aria-label="Default select example" required>
                                    <option selected>Ciudad autónoma de Buenos Aires</option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mt-2">
                                <span class="text-danger">*</span>
                                <label>Localidad</label>
                                <select class="form-select" name="localidad" aria-label="Default select example" required>
                                    <option selected>Belgrano</option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mt-2">
                                <span class="text-danger">*</span>
                                <label>ZIP Code
                                </label>
                                <input class="form-control" type="text" name="zip" placeholder="1548" required>
                            </div>                       
                        </div>
                    </div>
                </div>
            </form>

            <div class="col-lg-4">
    <div class="card border-secondary mb-5">
        <div class="card-header bg-dark border-0">
            <h4 class="font-weight-semi-bold m-0 text-white">Orden total</h4>
        </div>
        <div class="card-body contenedor-productos">
            <h5 class="font-weight-medium mb-3">Productos</h5>



            <?php if (empty($carrito)): ?>
                <p class="text-muted">Tu carrito está vacío.</p>
            <?php else: ?>
                <?php foreach ($carrito as $item): 
                    $totalItem = $item['price'] * $item['quantity'];
                    $subtotal += $totalItem;
                ?>
                <div class="item-producto d-flex justify-content-between mb-3 align-items-center">
                    <p class="mb-0"><?= htmlspecialchars($item['name']) ?></p>
                    <small class="text-muted mb-0">Cantidad: <?= $item['quantity'] ?></small>
                    <p class="mb-0 precio">$<?= number_format($totalItem, 0, ',', '.') ?></p>
                    <button class="btn btn-sm btn-danger eliminar-producto">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
                <?php endforeach; ?>
                <hr class="mt-0">
                <div class="d-flex justify-content-between mb-3 pt-1">
                    <h6 class="font-weight-medium">Subtotal</h6>
                    <h6 class="font-weight-medium">$<?= number_format($subtotal, 0, ',', '.') ?></h6>
                </div>
                <div class="d-flex justify-content-between">
                    <h6 class="font-weight-medium">Envío</h6>
                    <h6 class="font-weight-medium">$<?= number_format($envio, 0, ',', '.') ?></h6>
                </div>
            <?php endif; ?>
        </div>

        <div class="card-footer border-secondary bg-transparent">
            <div class="d-flex justify-content-between mt-2">
                <h5 class="font-weight-bold">Total</h5>
                <h5 class="font-weight-bold">$<?= number_format($subtotal + $envio, 0, ',', '.') ?></h5>
            </div>
        </div>
        <div class="card-footer border-secondary bg-transparent">
            <button class="btn btn-lg btn-block btn-dark font-weight-bold my-3 py-3">Confirmar compra</button>
        </div>
    </div>
</div>

        </div>
    </div>
    <!-- Checkout End -->

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
                <img src="./assets/img/tarjetas-de-debito.png" alt="">
                <p class="fs-small fw-regular">
                    Tarjetas de Crédito
                </p>
                <img src="./assets/img/tarjetas-de-credito.png" alt="">
                <p class="fs-small fw-regular">
                    Puntos de Pago
                </p>
                <img src="./assets/img/puntos-de-pago.png" alt="">
            </article>             
        </div>
        <div class="py-5 border-top">
            <img src="./assets/img/logo-forever-bikes.svg" alt="" class="d-block mx-auto">
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
    <script src="./assets/vendor/easing/easing.min.js"></script>
    <script src="./assets/vendor/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript 
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>File -->

    <!-- Javascript -->
    <script src="./assets/js/main.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
          const contenedor = document.querySelector(".contenedor-productos");
      
          contenedor.addEventListener("click", function (e) {
            const boton = e.target.closest(".eliminar-producto");
            if (boton) {
              const item = boton.closest(".item-producto");
              if (item) {
                item.remove();
                actualizarTotal();
              }
            }
          });
        });
      
        function actualizarTotal() {
          let total = 0;
          document.querySelectorAll(".item-producto .precio").forEach(precioElem => {
            const texto = precioElem.textContent.replace(/\$|\./g, "").replace(",", ".");
            const valor = parseFloat(texto);
            if (!isNaN(valor)) {
              total += valor;
            }
          });
      
          const envio = <?= $envio ?>; // valor fijo de envío
          const totalFinal = total + envio;
      
          // Actualizamos el subtotal y total en el DOM
          const subtotalElem = document.querySelector(".card-body .d-flex.justify-content-between.mb-3.pt-1 h6:last-child");
          const totalElem = document.querySelector(".card-footer .d-flex.justify-content-between.mt-2 h5:last-child");
      
          if (subtotalElem) subtotalElem.textContent = `$${total.toLocaleString("es-AR")}`;
          if (totalElem) totalElem.textContent = `$${totalFinal.toLocaleString("es-AR")}`;
        }
      </script>
      
      
      <script>
       $('#checkout-form').on('submit', function(e) {
            e.preventDefault(); // evita el submit tradicional

            const formData = $(this).serializeArray();
            const datos = {};
            formData.forEach(field => {
                datos[field.name] = field.value;
            });

            console.log("Enviando datos:", datos);

            $.ajax({
                url: 'process_checkout.php',
                type: 'POST',
                data: datos,
                dataType: 'json',
                success: function(respuesta) {
                    if (respuesta.success) {
                        alert("¡Compra realizada con éxito!");
                        window.location.href = "gracias.php";
                    } else {
                        alert("Error: " + respuesta.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error en el AJAX:", error);
                    alert("Ocurrió un error al procesar la compra.");
                }
            });
        });

    
        $('.btn-dark').on('click', function() {
            $('#checkout-form').submit(); // dispara el submit cuando se hace clic en "Confirmar compra"
            
        });
    </script>
    
      

</body>

</html>