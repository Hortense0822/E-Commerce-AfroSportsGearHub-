<?php
include_once('../settings/core.php');
include_once dirname(__DIR__) . '../controllers/product_controller.php';
include_once dirname(__DIR__) . '../controllers/brand_controller.php';
include_once dirname(__DIR__) . '../controllers/category_controller.php';


// Admin Side manage product


if (!isAdmin()) {
  header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>AfroSportGear Hub</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    body {
      margin-top: 20px;
      background: #f8f8f8
    }
  </style>
</head>

<body>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container">
    <div class="row flex-lg-nowrap">
      <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
        <div class="card p-2">
          <div class="e-navlist e-navlist--active-bg">
            <ul class="nav">
              <li class="nav-item"><a class="nav-link px-2 active" href="manageproduct.php"><i class="fa fa-fw fa-bar-chart mr-1"></i><span>Overview</span></a></li>
              <li class="nav-item"><a class="nav-link px-2" href="../index.php"><i class="fa fa-fw fa-th mr-1"></i><span>Shop</span></a></li>
              <li class="nav-item"><a class="nav-link px-2" href="manageproduct.php"><i class="fa fa-fw fa-th mr-1"></i><span>View products</span></a></li>
              <li class="nav-item"><a class="nav-link px-2" href="managecategory.php"><i class="fa fa-fw fa-th mr-1"></i><span>View categories</span></a></li>
              <li class="nav-item"><a class="nav-link px-2" href="managebrand.php"><i class="fa fa-fw fa-th mr-1"></i><span>View brands</span></a></li>
              <li class="nav-item"><a class="nav-link px-2" href="manageproduct.php"><i class="fa fa-fw fa-cog mr-1"></i><span>Add product</span></a></li>
              <li class="nav-item"><a class="nav-link px-2 active" href="managebrand.php"><i class="fa fa-fw fa-cog mr-1"></i><span>Add brand</span></a></li>
              <li class="nav-item"><a class="nav-link px-2" href="managecategory.php"><i class="fa fa-fw fa-cog mr-1"></i><span>Add category</span></a></li>
              <li class="nav-item"><a class="nav-link px-2" href="../actions/logout_process.php"><i class="fa fa-fw fa-cog mr-1"></i><span>Logout</span></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="e-tabs mb-3 px-3">
          <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" href="#">Products</a></li>
          </ul>
        </div>
        <div class="row flex-lg-nowrap">
          <div class="col mb-3">
            <div class="e-panel card">
              <div class="card-body">
                <div class="card-title">
                  <h6 class="mr-2"><span>Products</span><small class="px-1">Manage all your products</small></h6>
                </div>
                <div class="e-table">
                  <div class="table-responsive table-lg mt-3">
                    <table class="table table-bordered">
                      <!-- Table content -->

                      <thead>
                        <tr>
                          <th class="align-top">
                            <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0">
                              <input type="checkbox" class="custom-control-input" id="all-items">
                              <label class="custom-control-label" for="all-items"></label>
                            </div>
                          </th>
                          <th class="sortable">Product_tittle</th>
                          <th class="sortable">Product_image</th>
                          <th class="sortable">Product_price</th>
                          <th class="max-width">Product_cat</th>
                          <th class="sortable">Product_brand</th>
                          <th class="sortable">product_keyword</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $products = get_products_ctr();
                        foreach ($products as $product) {
                        ?>
                          <tr>
                            <td class="align-middle">
                              <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                                <input type="checkbox" class="custom-control-input" id="item-<?php echo $product['product_id']; ?>">
                                <label class="custom-control-label" for="item-<?php echo $product['product_id']; ?>"></label>
                              </div>
                            </td>
                            <td class="text-nowrap align-middle"><?php echo $product['product_title']; ?></td>
                            <td class="text-nowrap align-middle">
                              <div style="width: 70%; height: 70px;" class="img_container">
                                <img style="width: 100%; height: 100%; object-fit: fit;" src="../images/products/<?= $product['product_image']; ?>" alt="logo" class="img-fluid">
                              </div>
                            </td>
                            <td class="text-nowrap align-middle"><?php echo $product['product_price']; ?></td>
                            <!-- <td class="text-nowrap align-middle"><select name="product_cat"> //////This is for edit
                                                                    <option value="<?php //echo htmlspecialchars(get_category_ctr($product['product_cat'])["cat_name"]); 
                                                                                    ?>"><?php echo htmlspecialchars(get_category_ctr($product['product_cat'])["cat_name"]); ?></option>
                                                                </select>
                                                                </td> -->
                            <td class="text-nowrap align-middle"><?php echo htmlspecialchars(get_category_ctr($product['product_cat'])["cat_name"]); ?></td>
                            <td class="text-nowrap align-middle"><?php echo htmlspecialchars(get_brand_ctr($product['product_brand'])["brand_name"]); ?></td>
                            <!-- <td class="text-nowrap align-middle"><?php //echo $product['product_brand']; 
                                                                      ?></td> -->

                            <td class="text-nowrap align-middle"><?php echo $product['product_keywords']; ?></td>
                            <td class="text-center align-middle">
                              <div class="btn-group align-top">
                                <button class="btn btn-sm btn-outline-secondary badge edit-product-btn" type="button" data-product-id="<?php echo $product['product_id']; ?>" data-category-id="<?php echo $product['product_cat']; ?>" data-product-name="<?php echo $product['product_title']; ?>" data-product-image="<?php echo $product['product_image']; ?>" data-product-price="<?php echo $product['product_price']; ?>" data-product-category="<?php echo htmlspecialchars(get_category_ctr($product['product_cat'])["cat_name"]); ?>" data-product-brand="<?php echo htmlspecialchars(get_brand_ctr($product['product_brand'])["brand_name"]); ?>" data-product-keywords="<?php echo $product['product_keywords']; ?>">
                                  <i class="fa fa-pencil"></i>
                                </button>

                                <a href="../actions/deleteproduct_process.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-sm btn-outline-secondary badge"><i class="fa fa-trash"></i></a>
                              </div>
                            </td>
                          </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="d-flex justify-content-center">
                    <ul class="pagination mt-3 mb-0">
                      <!-- Pagination content -->
                      <li class="disabled page-item"><a href="#" class="page-link">‹</a></li>
                      <li class="active page-item"><a href="#" class="page-link">1</a></li>
                      <li class="page-item"><a href="#" class="page-link">2</a></li>
                      <li class="page-item"><a href="#" class="page-link">3</a></li>
                      <li class="page-item"><a href="#" class="page-link">4</a></li>
                      <li class="page-item"><a href="#" class="page-link">5</a></li>
                      <li class="page-item"><a href="#" class="page-link">›</a></li>
                      <li class="page-item"><a href="#" class="page-link">»</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-3 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="text-center px-xl-3">
                  <button class="btn btn-success btn-block add-product-btn" type="button" data-toggle="modal" data-target="#addProductModal">New Products</button>
                </div>
                <hr class="my-3">
                <div class="e-navlist e-navlist--active-bold">
                  <ul class="nav">
                    <li class="nav-item active"><a href class="nav-link"><span>All</span>&nbsp;<small>/&nbsp;32</small></a></li>
                    <li class="nav-item"><a href class="nav-link"><span>Active</span>&nbsp;<small>/&nbsp;16</small></a></li>
                    <li class="nav-item"><a href class="nav-link"><span>Selected</span>&nbsp;<small>/&nbsp;0</small></a></li>
                  </ul>
                </div>
                <hr class="my-3">
                <div>
                  <div class="form-group">
                    <label>Date from - to:</label>
                    <div>
                      <input id="dates-range" class="form-control flatpickr-input" placeholder="01 Dec 17 - 27 Jan 18" type="text" readonly="readonly">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Search by Name:</label>
                    <div><input class="form-control w-100" type="text" placeholder="Name" value></div>
                  </div>
                </div>
                <hr class="my-3">
                <div>
                  <label>Status:</label>
                  <div class="px-2">
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" name="user-status" id="users-status-disabled">
                      <label class="custom-control-label" for="users-status-disabled">Disabled</label>
                    </div>
                  </div>
                  <div class="px-2">
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" name="user-status" id="users-status-active">
                      <label class="custom-control-label" for="users-status-active">Active</label>
                    </div>
                  </div>
                  <div class="px-2">
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" name="user-status" id="users-status-any" checked>
                      <label class="custom-control-label" for="users-status-any">Any</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Add your form or content for adding a new product here -->
          <div class="py-1">
            <form class="form" method="POST" action="../actions/addproduct_process.php" enctype="multipart/form-data">
              <div class="row">
                <div class="col">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Product Category </label>
                        <select class="custom-select tm-select-accounts" id="category" name="product_cat">
                          <option selected>Select category</option>
                          <?php
                $categories = get_categories_ctr();

                foreach ($categories as $category) {
                ?>
                  <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name'] ?></option>
                <?php
                }
                ?>
                        </select>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label>Product Brand</label>
                        <select class="custom-select tm-select-accounts" id="category" name="product_brand">
                          <option selected>Select brand</option>
                          <?php
                $brands = get_brands_ctr();
                print_r($brands);
                foreach ($brands as $brand) {
                ?>
                  <option value="<?php echo $brand['brand_id']; ?>"><?php echo $brand['brand_name']; ?></option>
                <?php
                }
                ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input class="form-control" type="text" name="product_title" placeholder="user@example.com">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Product Price</label>
                        <input class="form-control" name="product_price" type="text" placeholder="money in cedis">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Product Keyword</label>
                        <input class="form-control" name="product_keyword" type="text" placeholder="enter keyword">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label>Product Image</label>
                        <input class="form-control" type="file" id="product_image" name="product_image">
                      </div>
                    </div>
                  </div>


                </div>
              </div>
              <div class="row">
                <div class="col d-flex justify-content-end">
                  <button class="btn btn-primary" type="submit">Add product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>
  </div>
  </div>
  </div>

  </div>
  </div>
  </div>
  </div>


  <!-- Edit Product Modal -->
  <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <!-- Modal content -->
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editProductForm" method="POST" action="../actions/editproduct_process.php">
            <input type="hidden" id="editProductId" name="productId">
            <div class="form-group">
              <label for="editProductName">Product Name</label>
              <input type="text" class="form-control" id="editProductName" name="product_title">
            </div>
            <div class="form-group">
              <label for="editProductPrice">Product Price</label>
              <input type="text" class="form-control" id="editProductPrice" name="product_price">
            </div>

            <div class="form-group">
              <label for="editProductKeyWord">Product Keyword</label>
              <input type="text" class="form-control" id="editProductKeyWord" name="product_keyword">
            </div>
            <div class="form-group">
              <label for="editProductCategory">Product Category</label>
              <select class="form-control" id="editProductCategory" name="product_cat">
                <?php
                $categories = get_categories_ctr();

                foreach ($categories as $category) {
                ?>
                  <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="editProductBrand">Product Brand</label>
              <select class="form-control" id="editProductBrand" name="product_brand" >
                <?php
                $brands = get_brands_ctr();
                print_r($brands);
                foreach ($brands as $brand) {
                ?>
                  <option value="<?php echo $brand['brand_id']; ?>"><?php echo $brand['brand_name']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

  <script>
    // jQuery to handle the click event of the "Add Product" button
    $(document).ready(function() {
      $('.add-product-btn').click(function() {
        $('#addProductModal').modal('show');
      });

      // jQuery to handle the click event of the "Edit" button
      $('.edit-product-btn').click(function() {
        var productId = $(this).data('product-id');
        var productName = $(this).data('product-name');
        var productPrice = $(this).data('product-price');
        var productCategory = $(this).data('product-category');
        var productBrand = $(this).data('product-brand');
        var productKey = $(this).data('product-keywords');
        $('#editProductId').val(productId);
        $('#editProductName').val(productName);
        $('#editProductPrice').val(productPrice);
        $('#editProductCategory').val(productCategory);
        $('#editProductBrand').val(productBrand);
        $('#editProductKeyWord').val(productKey);
        $('#editProductModal').modal('show');
      });

      // $('.delete-btn')
    });
  </script>

</body>

</html>

