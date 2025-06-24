<?php 
require '../../vendor/autoload.php';

use App\Models\Product;
$bikeModel = new Product();
$catAndSub = $bikeModel->getSubCategory($idSubCategory);
$breadCrumbSub = $catAndSub['subCategory'];
$breadCrumbCat = $catAndSub['category'];

$applyAllFilters = $bikeModel->getSubcategoriesApplyFilters($idSubCategory);

if ($applyAllFilters)
    $hide = "";
else
    $hide = "d-none";

    
?>


    <!-- Shop Start -->
    <div class="container-fluid pt-0 pt-md-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-2 col-md-12 sidebar">

                 <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4 d-none">
                    <h5 class="font-weight-semi-bold mb-4">Filtrar por precios</h5>
                    <form class="filter-form" data-filter="price" id="price-filters">                       
                    </form>
                </div> 
                <!-- Price End -->

                <!-- Color Start -->                
                <div class="border-bottom filter-color mb-4 pb-4 <?= $hide ?>" >
                    <h5 class="font-weight-semi-bold mb-4">Filtrar por color</h5>
                    <form id="color-filters">
                    </form>
                </div>            
                <!-- Color End -->

                <?php if(isset($filterPrecategory) && $filterPrecategory == 1): ?>
                <!-- Category Start -->
                <div class="border-bottom filter-category mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filtrar por categoría</h5>
                    <form id="category-filters"></form>
                </div> 
                <!-- Category End -->
                <?php endif; ?>

                <!-- Size Start -->
                <div class="filter-size mb-5 <?= $hide ?>">
                    <h5 class="font-weight-semi-bold mb-4">Filtrar por tamaño</h5>
                    <form id="size-filters"></form>
                </div> 
                <!-- Size End -->

            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <main class="col-md-12 col-lg-10 content mt-3 mt-md-0">
                <div class="row">
                    <div class="d-inline-flex mb-2">
                        <p class="m-0 me-1 "><a href="../../index.php" class="text-key ">Home</a></p>
                        <p class="m-0 me-1 "><a href="./index.php" class="text-key fw-bold ms-2"><?= $breadCrumbCat ?></a></p>
                        <p class="m-0"> > <?= $breadCrumbSub ?></p>
                    </div> 
                    <!--
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
                    -->

                    <div id="product-list" class="row">
                    </div>                    
                    <!--
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
                    -->
                </div>
            </main>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


 <script>
    document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.querySelector('.col-lg-2');
    const main    = document.querySelector('main.col-lg-10');

    if (sidebar && main) {
        // compruebo si no hay nada de filtro visible
        if (sidebar.innerText.trim() === '') {
        sidebar.classList.add('d-none');                   // oculto sidebar
        main.classList.replace('col-lg-10', 'col-lg-12');  // main ocupa 12 cols
        }
    }
    });
</script>