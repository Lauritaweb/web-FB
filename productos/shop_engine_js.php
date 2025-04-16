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
        $.getJSON('../get_filters.php', function (data) {
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

    function aplicarFiltros() {
      // let category = $('#filter-category').val();
      let category = <?= json_encode($idSubCategory) ?>;
      let sizes = $('#filter-size').val();
      let colors = $('#filter-color').val();


      $.ajax({
        url: '../filter_products.php',
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