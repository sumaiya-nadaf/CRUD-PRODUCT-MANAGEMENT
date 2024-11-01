<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>PHP/AJAX-BOOTSTRAP TASK</title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
      <!-- Success Alert -->
      <div id="addProductAlert" class="alert alert-success d-none position-fixed top-0 start-50 translate-middle-x"
            role="alert">
            Congratulations, new product has been added successfully!
      </div>
      <div id="updateProductAlert" class="alert alert-success d-none position-fixed top-0 start-50 translate-middle-x"
            role="alert">
            Congratulations, product has been updated successfully!
      </div>

      <div class="container-fluid">
            <h1 class="text-center"><b>CRUD PRODUCT MANAGEMENT</b></h1>

            <div class="row">
                  <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                              <h3 class="text-center">PRODUCT LIST</h3>
                              <button class="button" data-bs-toggle="offcanvas" data-bs-target="#addProductDrawer"
                                    aria-controls="addProductDrawer">
                                    Add Product
                              </button>
                        </div>
                        <div class="table-responsive">
                              <table class="table table-striped">
                                    <thead>
                                          <tr>
                                                <th>Product Name</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Category</th>
                                                <th>Actions</th>
                                          </tr>
                                    </thead>
                                    <tbody id="productTableBody">
                                          <!-- Product rows will be dynamically added -->
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>

      <!-- Offcanvas Drawer for Add Product -->
      <div class="offcanvas offcanvas-end" tabindex="-1" id="addProductDrawer" aria-labelledby="addProductDrawerLabel">
            <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="addProductDrawerLabel">Add Product Form</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                  <form id="addProductForm" enctype="multipart/form-data">
                        <div class="mb-3">
                              <label for="productName" class="form-label">Product Name</label>
                              <input type="text" class="form-control" id="productName" name="name" required>
                        </div>
                        <div class="mb-3">
                              <label for="productDescription" class="form-label">Description</label>
                              <textarea class="form-control" id="productDescription" name="description"
                                    required></textarea>
                        </div>
                        <div class="mb-3">
                              <label for="productImage" class="form-label">Product Image</label>
                              <input type="file" class="form-control" id="productImage" name="image" accept="image/*"
                                    required>
                        </div>
                        <div class="mb-3">
                              <label for="productPrice" class="form-label">Price</label>
                              <input type="number" class="form-control" id="productPrice" name="price" required>
                        </div>
                        <div class="mb-3">
                              <label for="productCategory" class="form-label">Category</label>
                              <select class="form-select" id="productCategory" name="category_id" required></select>
                        </div>
                        <button type="submit" class="button">Add Product</button>
                  </form>
            </div>
      </div>

      <!-- Hidden Form for Editing Product -->
      <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              <form id="editProductForm" enctype="multipart/form-data">
                                    <input type="hidden" id="editProductId" name="id">
                                    <div class="mb-3">
                                          <label for="editProductName" class="form-label">Product Name</label>
                                          <input type="text" class="form-control" id="editProductName" name="name"
                                                required>
                                    </div>
                                    <div class="mb-3">
                                          <label for="editProductDescription" class="form-label">Description</label>
                                          <textarea class="form-control" id="editProductDescription" name="description"
                                                required></textarea>
                                    </div>
                                    <div class="mb-3">
                                          <label for="editProductImage" class="form-label">Product Image</label>
                                          <input type="file" class="form-control" id="editProductImage" name="image"
                                                accept="image/*">
                                    </div>
                                    <div class="mb-3">
                                          <label for="editProductPrice" class="form-label">Price</label>
                                          <input type="number" class="form-control" id="editProductPrice" name="price"
                                                required>
                                    </div>
                                    <div class="mb-3">
                                          <label for="editProductCategory" class="form-label">Category</label>
                                          <select class="form-select" id="editProductCategory" name="category_id"
                                                required></select>
                                    </div>
                                    <button type="submit" class="button">Update Product</button>
                              </form>
                        </div>
                  </div>
            </div>
      </div>

      <script src=Script.js></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>