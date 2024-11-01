$(document).ready(function () {
      // Fetch and display products
      function fetchProducts() {
          $.ajax({
              url: 'crud.php',
              type: 'POST',
              data: { action: 'fetch' },
              success: function (response) {
                  $('#productTableBody').html(response);
              }
          });
      }

      // Fetch and display categories
      function fetchCategories() {
          $.ajax({
              url: 'crud.php',
              type: 'POST',
              data: { action: 'fetchCategories' },
              dataType: 'json',
              success: function (categories) {
                  var options = '';
                  $.each(categories, function (index, category) {
                      options += '<option value="' + category.id + '">' + category.name + '</option>';
                  });
                  $('#productCategory, #editProductCategory').html(options); // Populate both forms
              }
          });
      }

      // Add Product
      $('#addProductForm').on('submit', function (e) {
          e.preventDefault();
          var formData = new FormData(this);
          formData.append('action', 'add');

          $.ajax({
              url: 'crud.php',
              type: 'POST',
              data: formData,
              contentType: false,
              processData: false,
              success: function () {
                  fetchProducts();
                  $('#addProductForm')[0].reset();
                  $('#addProductDrawer').offcanvas('hide');

                  // Show success message
                  $('#addProductAlert').removeClass('d-none');

                  // Hide success message after 3 seconds
                  setTimeout(function () {
                      $('#addProductAlert').addClass('d-none');
                  }, 3000);
              }
          });
      });

      // Edit Product
      $(document).on('click', '.editProduct', function () {
          var productId = $(this).data('id');
          $.ajax({
              url: 'crud.php',
              type: 'POST',
              data: { action: 'getProduct', id: productId },
              dataType: 'json',
              success: function (product) {
                  // Pre-fill the form with product data
                  $('#editProductId').val(product.id);
                  $('#editProductName').val(product.name);
                  $('#editProductDescription').val(product.description);
                  $('#editProductPrice').val(product.price);
                  $('#editProductCategory').val(product.category_id);

                  // Show the modal
                  $('#editProductModal').modal('show');
              }
          });
      });

      // Update Product
      $('#editProductForm').on('submit', function (e) {
          e.preventDefault();
          var formData = new FormData(this);
          formData.append('action', 'update');

          $.ajax({
              url: 'crud.php',
              type: 'POST',
              data: formData,
              contentType: false,
              processData: false,
              success: function () {
                  fetchProducts();
                  $('#editProductModal').modal('hide');

                  // Show success message for update
                  $('#updateProductAlert').removeClass('d-none');

                  // Hide success message after 3 seconds
                  setTimeout(function () {
                      $('#updateProductAlert').addClass('d-none');
                  }, 3000);
              }
          });
      });

      // Delete Product
      $(document).on('click', '.deleteProduct', function () {
          var productId = $(this).data('id');
          if (confirm('Are you sure you want to delete this product?')) {
              $.ajax({
                  url: 'crud.php',
                  type: 'POST',
                  data: { action: 'delete', id: productId },
                  success: function () {
                      fetchProducts();
                  }
              });
          }
      });

      // Load products and categories on page load
      fetchProducts();
      fetchCategories();
  });