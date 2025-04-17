<?php 
require '../../vendor/autoload.php';

use App\Models\Bike;
$bikeModel = new Bike();

?>

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


 