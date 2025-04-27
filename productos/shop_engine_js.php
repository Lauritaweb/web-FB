


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
        $.getJSON('../get_filters.php', function (data) {
            renderFilters(data.colors, '#color-filters', 'color');
            renderFilters(data.sizes, '#size-filters', 'size');
             // Restaurar y aplicar después de que se rendericen
             evaluatePageChange();
            
            
        });

        function evaluatePageChange(){
          const referrer = document.referrer;
          const currentUrl = window.location.href;
          const currentPath = window.location.pathname;
          const currentHost = window.location.host;

          const cameFromSamePage = referrer.includes(currentPath);
          const cameFromSameHost = referrer.includes(currentHost);
          const navType = performance.getEntriesByType("navigation")[0].type;

          // Si no venís de la misma página y no fue una recarga o botón "atrás"
          if (!cameFromSamePage && navType === "navigate") {
            localStorage.removeItem('selectedColorFilters');
            localStorage.removeItem('selectedSizeFilters');
            console.log("Filtros eliminados por cambio de página");
          } else {
            restoreFiltersFromLocalStorage();
            aplicarFiltros();
            console.log("Filtros conservados");
          }

        }

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
  let category = <?= json_encode($idSubCategory) ?>;

  // Obtener talles seleccionados
  let sizes = [];
  $('#size-filters input[type="checkbox"]:checked').each(function () {
    const value = $(this).val();
    if (value !== 'size-all') {
      sizes.push(value);
    }
  });

  // Obtener colores seleccionados
  let colors = [];
  $('#color-filters input[type="checkbox"]:checked').each(function () {
    const value = $(this).val();
    if (value !== 'color-all') {
      colors.push(value);
    }
  });

  

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
                  <a href="../../detail.php?id=${product.id}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-dark me-1"></i>Ver detalles</a>
                </div>
              </div>
            </div>`;
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
    });
    

    $(document).ready(function () {
    function setupFilterGroup(groupClassPrefix) {
        $(`#${groupClassPrefix}-filters`).on('change', 'input[type=checkbox]', function () {
            const isAll = $(this).attr('id') === `${groupClassPrefix}-all`;

            if (isAll && $(this).is(':checked')) {
                // Si se selecciona "Todos", desmarcar los demás
                $(`#${groupClassPrefix}-filters input[type=checkbox]`).not(this).prop('checked', false);
            } else if (!isAll) {
                // Si se selecciona otro, desmarcar "Todos"
                $(`#${groupClassPrefix}-filters #${groupClassPrefix}-all`).prop('checked', false);
            }

            // Aplicar filtros automáticamente
            aplicarFiltros();
        });
    }

    setupFilterGroup('color');
    setupFilterGroup('size');
});



    $(document).ready(function () {
      function setupFilterGroup(groupClassPrefix) {
          const containerSelector = `#${groupClassPrefix}-filters`;

          $(containerSelector).on('change', 'input[type=checkbox]', function () {
              const isAll = $(this).attr('id') === `${groupClassPrefix}-all`;

              if (isAll && $(this).is(':checked')) {
                  $(containerSelector + ' input[type=checkbox]').not(this).prop('checked', false);
              } else if (!isAll) {
                  $(`#${groupClassPrefix}-all`).prop('checked', false);
              }

              // 🧠 Si no hay ningún checkbox marcado, se marca "Todos"
              const checked = $(`${containerSelector} input[type=checkbox]:checked`);
              if (checked.length === 0) {
                  $(`#${groupClassPrefix}-all`).prop('checked', true);
              }

              // Guardar filtros
              saveFiltersToLocalStorage();

              // Aplicar automáticamente
              aplicarFiltros();
          });
      }

      setupFilterGroup('color');
      setupFilterGroup('size');
});





function saveFiltersToLocalStorage() {
    const filters = {
        sizes: $('#size-filters input[type=checkbox]:checked').map(function () { return this.id; }).get(),
        colors: $('#color-filters input[type=checkbox]:checked').map(function () { return this.id; }).get()
    };
    localStorage.setItem('productFilters', JSON.stringify(filters));
}




function restoreFiltersFromLocalStorage() {
    const saved = JSON.parse(localStorage.getItem('productFilters'));

    if (saved) {
        // Restaurar colores
        $('#color-filters input[type=checkbox]').prop('checked', false);
        saved.colors.forEach(id => $(`#${id}`).prop('checked', true));

        // Restaurar tamaños
        $('#size-filters input[type=checkbox]').prop('checked', false);
        saved.sizes.forEach(id => $(`#${id}`).prop('checked', true));
    }
}

</script>