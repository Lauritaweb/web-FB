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
            <div class="col-lg-2 col-md-12 d-none d-md-block">
                <!-- Subcategories Start -->
                <?php if (isset($subfilter) && $subfilter === true): ?>
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filtrar por subcategorías</h5>
                    <form id="subcategories-filters">
                        <?php 
                        // Obtener todas las subcategorías disponibles
                        $allSubcategories = $bikeModel->getSubCategoriesById($idSubCategory);
                       
                        foreach ($allSubcategories as $subcat): ?>
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" 
                                   id="subcat-<?php echo $subcat['id']; ?>" 
                                   value="<?php echo $subcat['id']; ?>"
                                   <?php echo in_array($subcat['id'], $idSubCategory) ? 'checked' : ''; ?>>
                            <label class="custom-control-label" for="subcat-<?php echo $subcat['id']; ?>">
                                <?php echo htmlspecialchars($subcat['description']); ?>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </form>
                </div>
                <?php endif; ?>
                <!-- Subcategories End -->               
                
                 <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filtrar por precios</h5>
                    <form class="filter-form" data-filter="price" id="price-filters">                       
                    </form>
                </div> 
                <!-- Price End -->

                <!-- Color Start -->                
                <div class="border-bottom mb-4 pb-4 <?= $hide ?>" >
                    <h5 class="font-weight-semi-bold mb-4">Filtrar por color</h5>
                    <form id="color-filters">
                    </form>
                </div>            
                <!-- Color End -->

                <!-- Size Start -->
                <div class="mb-5 <?= $hide ?>">
                    <h5 class="font-weight-semi-bold mb-4">Filtrar por tamaño</h5>
                    <form id="size-filters"></form>
                </div> 
                <!-- Size End -->

            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <main class="col-md-12 col-lg-10">
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
        // Manejar cambios en los filtros de subcategorías
        document.addEventListener('DOMContentLoaded', function() {
            const subcategoryFilters = document.getElementById('subcategories-filters');
            if (subcategoryFilters) {
                subcategoryFilters.addEventListener('change', function(e) {
                    const selectedSubcategories = Array.from(
                        subcategoryFilters.querySelectorAll('input[type="checkbox"]:checked')
                    ).map(checkbox => checkbox.value);

                    // Actualizar los productos filtrados
                    updateFilteredProducts(selectedSubcategories);
                });
            }
        });

        function updateFilteredProducts(subcategories) {
            // Aquí deberías hacer una llamada AJAX para actualizar los productos
            // basado en las subcategorías seleccionadas
            // Por ejemplo:
            fetch('../filter_products.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    subcategories: subcategories
                })
            })
            .then(response => response.json())
            .then(data => {
                // Actualizar la lista de productos con los nuevos resultados
                updateProductList(data);
            })
            .catch(error => console.error('Error:', error));
        }

        function updateProductList(products) {
            const productList = document.getElementById('product-list');
            if (!productList) return;

            productList.innerHTML = '';
            products.forEach(product => {
                const productDiv = document.createElement('div');
                productDiv.className = 'col-lg-4 col-md-6 col-sm-12 mb-4';
                productDiv.innerHTML = `
                    <div class="card product-item">
                        <div class="card-body text-center">
                            <img src="${product.image}" alt="${product.name}" class="img-fluid mb-3">
                            <h5 class="card-title">${product.name}</h5>
                            <p class="card-text">$${product.price}</p>
                        </div>
                    </div>
                `;
                productList.appendChild(productDiv);
            });
        }
    </script>


 