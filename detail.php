<?php
require 'vendor/autoload.php';

use App\Models\Product;
use App\Utils\Utils;

$productModel = new Product();
$productId = isset($_GET['id']) ? ($_GET['id']) : 0;
$product = $productModel->getProductWithVariants($productId);

if (!$product) {
    echo "Producto no encontrado.";
    exit;
}

// var_dump($product);
extract($product['product']);
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
    <header class="container-fluid header bg-three mb-5 mt-5">
        <div class="d-flex flex-column align-items-center justify-content-center">
            
        </div>
    </header>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner border">
                        <?php foreach ($product['images'] as $i => $imgUrl): ?>
                            <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                                <img class="w-100 h-100" src="assets/media/image/<?= htmlspecialchars($imgUrl) ?>" alt="Producto">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-bs-slide="prev">
                        <i class="bi bi-arrow-left-circle-fill text-white" style="font-size: 50px!important;"></i>
                    </a>
                    <a class="carousel-control-next fs-6" href="#product-carousel" data-bs-slide="next">
                        <i class="bi bi-arrow-right-circle-fill text-white fs-6" style="font-size: 50px!important;"></i>
                    </a>
                    <!-- controles -->
                </div>
            </div>


            

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold"><?= $name ?></h3>
                
                <h3 class="font-weight-semi-bold mb-4">$<?= Utils::mostrarTarifaSinCentavos($price) ?></h3>
                <p class="mb-4"><?= $shortdetails ?></p>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 me-3">Sizes:</p>
                    <form class="d-flex">
                    <?php foreach ($product['sizes'] as $i => $size): ?>
                        <div class="custom-control custom-radio custom-control-inline ms-3">
                            <input type="radio" class="custom-control-input" id="size-<?= $i ?>" name="size">
                            <label class="custom-control-label" for="size-<?= $i ?>"><?= ($size) ?></label>
                        </div>
                    <?php endforeach; ?>

                    </form>
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 me-3">Colores:</p>
                    <form class="d-flex flex-wrap">
                    <?php foreach ($product['colors'] as $i => $color): ?>
                        <div class="custom-control custom-radio custom-control-inline ms-3">
                            <input type="radio" class="custom-control-input" id="color-<?= $i ?>" name="color">
                            <label class="custom-control-label" for="color-<?= $i ?>"><?= ($color) ?></label>
                        </div>
                    <?php endforeach; ?>
                    </form>
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity me-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-dark btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center mx-1" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-dark btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-dark px-3"><i class="fa fa-shopping-cart me-1"></i> Agregar al carrito</button>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Compartir:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2"  
                            id="whatsapp-share" 
                            target="_blank" 
                            title="Compartir por WhatsApp">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-bs-toggle="tab" href="#tab-pane-1">Descripción</a>
                   <!-- <a class="nav-item nav-link" data-bs-toggle="tab" href="#tab-pane-2">Información</a> -->
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3"><?= $name ?></h4>
                        <p><?= $description ?></p>                    
                    </div>
                    <!--
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Información adicional</h4>
                        <p>
                            La Lite Aluminio te ofrecen un andar ultraliviano ya que cuentan con cuadro de aluminio y horquilla de carbono.
                        </p>
                        <p>
                            El diseño de esta bici favorece la aerodinámica para alcanzar una mejor velocidad final. Todos sus rodamientos son Shimano y cuenta con postura regulable. Esta bici está preparada para recorrer largas distancias y acompañarte en tus entrenamientos. Si buscas liviandad, velocidad y una postura aerodinámica, esta bici es para vos.
                        </p>
                        <ul class="list-group list-group-flush">
                            
                        </ul>
                            </p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Cuadro de aluminio hidroformado con horquilla de carbono.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Bicolor en negro mate y rosa metalizado.
                                    </li>
                                    
                                  </ul> 
                            </div>
                        </div>
                    </div>
                    -->
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5 d-none">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Quizás te puede interesar estos productos</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="./assets/img/product-1.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Storm</h6>
                            <div class="d-flex justify-content-center">
                                <h6> $755.000</h6> 
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-dark me-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-dark me-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="./assets/img/product-2.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Storm</h6>
                            <div class="d-flex justify-content-center">
                                <h6> $755.000</h6> 
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-dark me-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-dark me-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="./assets/img/product-3.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Storm</h6>
                            <div class="d-flex justify-content-center">
                                <h6> $755.000</h6> 
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-dark me-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-dark me-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="./assets/img/product-4.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Storm</h6>
                            <div class="d-flex justify-content-center">
                                <h6> $755.000</h6> 
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-dark me-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-dark me-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="./assets/img/product-5.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Storm</h6>
                            <div class="d-flex justify-content-center">
                                <h6> $755.000</h6> 
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-dark me-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-dark me-1"></i>Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

    <?php  
        include('./footer.html');
    ?>


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
document.querySelector('.btn-dark.px-3').addEventListener('click', function () {
    const productId = '<?= $productId ?>';
    const name = <?= json_encode($name) ?>;
    const price = <?= $price ?>;
    const image = <?= json_encode($product['images'][0] ?? '') ?>;

    const quantity = parseInt(document.querySelector('.form-control').value);
    const size = document.querySelector('input[name="size"]:checked')?.nextElementSibling.textContent.trim();
    const color = document.querySelector('input[name="color"]:checked')?.nextElementSibling.textContent.trim();

    if (!size || !color) {
        alert("Seleccioná tamaño y color");
        return;
    }

    fetch('add_to_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
            product_id: productId,
            name,
            price,
            quantity,
            size,
            color,
            image
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert("Producto agregado al carrito");
        }
    });
});
</script>
<!-- share -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const url = encodeURIComponent(window.location.href);
    const mensaje = encodeURIComponent("Echale un vistazo a este producto que me gustó:");
    const linkWhatsApp = `https://wa.me/?text=${mensaje}%20${url}`;
    document.getElementById("whatsapp-share").href = linkWhatsApp;
  });
</script>

</body>

</html>