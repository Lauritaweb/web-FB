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

  let idSubcategory = <?php echo json_encode($idSubCategory); ?>;
  let filterPrecategory = <?php echo isset($filterPrecategory) ? $filterPrecategory : 0; ?>;
  let availableCategories = [];
          
  $(document).ready(function () {
    $.getJSON('../get_filters.php', { idSubcategory: idSubcategory } , function (data) {
      availableCategories = data.subcategories;
      renderFilters(data.colors, '#color-filters', 'color');
      renderFilters(data.sizes, '#size-filters', 'size');
      
      // Solo renderizar el filtro de categoría si filterPrecategory es 1
      if (filterPrecategory === 1) {
        renderFilters(data.subcategories, '#category-filters', 'category');
      }
      
      renderPriceFilters(data.prices, '#price-filters');

      if (evaluatePageChange()) {
        localStorage.removeItem('selectedColorFilters');
        localStorage.removeItem('selectedSizeFilters');
        localStorage.removeItem('selectedPriceFilters');
        console.log("Filtros eliminados por cambio de página");
      } else {
        restoreFiltersFromLocalStorage();
        console.log("Filtros conservados");
      }

      aplicarFiltros();
    });
  });
          
                     
  $(document).ready(function () {
    $.getJSON('../get_filters.php', { idSubcategory: idSubcategory } , function (data) {
      renderFilters(data.colors, '#color-filters', 'color');
      renderFilters(data.sizes, '#size-filters', 'size');
      renderFilters(data.subcategories, '#category-filters', 'category');
      renderPriceFilters(data.prices, '#price-filters');

      if (evaluatePageChange()) {
        localStorage.removeItem('selectedColorFilters');
        localStorage.removeItem('selectedSizeFilters');
        localStorage.removeItem('selectedPriceFilters');
        console.log("Filtros eliminados por cambio de página");
      } else {
        restoreFiltersFromLocalStorage();
        console.log("Filtros conservados");
      }

      aplicarFiltros();
    });
  });


/**
     * 
     * Evalua si se cambio de pagina o si nos mantenemos en la misma
     * 
     */
    function evaluatePageChange() {
      const referrer = document.referrer;
      const currentUrl = window.location.href;
      const currentPath = window.location.pathname;
      const currentHost = window.location.host;

      const cameFromSamePage = referrer.includes(currentPath);
      const cameFromSameHost = referrer.includes(currentHost);
      const navType = performance.getEntriesByType("navigation")[0].type;

      // Si no venís de la misma página y no fue una recarga o botón "atrás"
      if (!cameFromSamePage && navType === "navigate") {
        return true;
      } else {
        return false;
      }

    }

    /**
    * 
    * Despliega los filtros en pantalla
    * 
    */
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



    function renderPriceFilters(prices, containerSelector) {
      const $container = $(containerSelector);
      $container.empty();

      // Filtro "Todos los precios"
      const allFilter = `
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start mb-3">
          <input type="checkbox" class="custom-control-input price-filter" id="price-all" value="all" checked>
          <label class="custom-control-label ms-2" for="price-all">Todos los precios</label>
        </div>
      `;
      $container.append(allFilter);

      prices.forEach((price, index) => {
        const id = `price-${index + 1}`;
        const filter = `
          <div class="custom-control custom-checkbox d-flex align-items-center justify-content-start mb-3">
            <input type="checkbox" class="custom-control-input price-filter" id="${id}" value="${price.id}">
            <label class="custom-control-label ms-2" for="${id}">${price.label}</label>
          </div>
        `;
        $container.append(filter);
      });
    }


  function aplicarFiltros() {
    // Obtener categorías seleccionadas
    let categories = [];
    
    if (filterPrecategory === 1) {
      const isAllSelected = $('#category-all').is(':checked');
      
      if (isAllSelected) {
        // Si está seleccionado "Todos", enviar todas las categorías disponibles
        availableCategories.forEach(category => {
          categories.push(category.id);
        });
      } else {
        // Si no está seleccionado "Todos", obtener las categorías específicas
        $('#category-filters input[type="checkbox"]:checked').each(function() {
          const value = $(this).val();
          if (value !== 'category-all') {
            categories.push(value);
          }
        });
      }
    } else {
      // Si filterPrecategory no es 1, enviar todas las categorías disponibles
      availableCategories.forEach(category => {
        categories.push(category.id);
      });
    }

    // Obtener talles seleccionados
    let sizes = [];
    $('#size-filters input[type="checkbox"]:checked').each(function() {
      const value = $(this).val();
      if (value !== 'size-all') {
        sizes.push(value);
      }
    });

    // Obtener colores seleccionados
    let colors = [];
    $('#color-filters input[type="checkbox"]:checked').each(function() {
      const value = $(this).val();
      if (value !== 'color-all') {
        colors.push(value);
      }
    });

    // Obtener precios seleccionados
    let prices = [];
    $('#price-filters input[type="checkbox"]:checked').each(function() {
      const value = $(this).val();
      if (value !== 'price-all') {
        prices.push(value);
      }
    });

    $.ajax({
      url: '../filter_products.php',
      type: 'POST',
      dataType: 'json',
      data: {
        category: categories.length > 0 ? categories : null,
        sizes: sizes,
        colors: colors,
        prices: prices
      },
      success: function(products) {
        let html = '';
        if (products.length > 0) {
          products.forEach(function(product) {
            let formattedPrice = parseInt(product.price).toLocaleString('es-AR');
            html += `
              <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                  <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <a href="../${product.category}/${product.name}">
                      <img class="img-fluid w-100" src="../../assets/media/image/${product.image}" alt="${product.name}">
                    </a>
                  </div>
                  <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">${product.name}</h6>
                    <div class="d-flex justify-content-center">
                      <h6>$${formattedPrice}</h6>
                    </div>
                  </div>
                  <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="../${product.category}/${product.name}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-dark me-1"></i>Ver detalles</a>
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


  /**
  * 
  * Si clickea "Todos" → se desmarcan los demás.
  * Si marca algo → se desmarca "Todos".
  * Si desmarca todo → se marca solo "Todos".
  * Se guarda en localStorage y se restauran al volver.
  * 
  */
  $(document).ready(function() {
    function setupFilterGroup(groupClassPrefix) {
      const containerSelector = `#${groupClassPrefix}-filters`;

      $(containerSelector).on('change', 'input[type=checkbox]', function() {
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
    setupFilterGroup('price');
    setupFilterGroup('category');

  });


  function saveFiltersToLocalStorage() {
    const filters = {
      sizes: $('#size-filters input[type=checkbox]:checked').map(function() {
        return this.id;
      }).get(),
      colors: $('#color-filters input[type=checkbox]:checked').map(function() {
        return this.id;
      }).get(),
      categories: $('#category-filters input[type=checkbox]:checked').map(function() {
        return this.id;
      }).get()
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

      // Restaurar categorías
      $('#category-filters input[type=checkbox]').prop('checked', false);
      saved.categories.forEach(id => $(`#${id}`).prop('checked', true));
    }
  }
</script>
