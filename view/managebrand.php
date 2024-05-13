<?php 
include_once('../functions/categoriesview.php');
include_once('../functions/brandview.php');
include_once('../functions/productview.php');
include_once('../settings/core.php');

if (!isAdmin()) {
  header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>AfroSportGear Hub - Manage Brands</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    body{
      margin-top:20px;
      background:#f8f8f8
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
            <li class="nav-item"><a class="nav-link active" href="#">Brands</a></li>
          </ul>
        </div>
        <div class="row flex-lg-nowrap">
          <div class="col mb-3">
            <div class="e-panel card">
              <div class="card-body">
                <div class="card-title">
                  <h6 class="mr-2"><span>Brands</span><small class="px-1">Manage all your Brands</small></h6>
                </div>
                <div class="e-table">
                  <div class="table-responsive table-lg mt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="align-top">
                            <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0">
                              <input type="checkbox" class="custom-control-input" id="all-items">
                              <label class="custom-control-label" for="all-items"></label>
                            </div>
                          </th>
                          <th class="max-width">Brand Name</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $brands = get_brands_ctr();
                          foreach ($brands as $brand) {
                        ?>
                        <tr>
                          <td class="align-middle">
                            <div class="custom-control custom-control-inline custom-checkbox custom-control-nameless m-0 align-top">
                              <input type="checkbox" class="custom-control-input" id="item-<?php echo $brand['brand_id']; ?>">
                              <label class="custom-control-label" for="item-<?php echo $brand['brand_id']; ?>"></label>
                            </div>
                          </td>
                          <td class="text-nowrap align-middle"><?php echo $brand['brand_name']; ?></td>
                          <td class="text-center align-middle">
                            <div class="btn-group align-top">
                            <button class="btn btn-sm btn-outline-secondary badge edit-brand-btn" type="button" data-brand-id="<?php echo $brand['brand_id']; ?>" data-brand-name="<?php echo $brand['brand_name']; ?>"><i class="fa fa-pencil"></i></button>
                              <a href="../actions/deletebrand_process.php?brand_id=<?php echo $brand['brand_id']; ?>" class="btn btn-sm btn-outline-secondary badge"><i class="fa fa-trash"></i></a>
                            </div>
                          </td>
                        </tr>
                        <?php
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>


                  
<div class="modal fade" role="dialog" tabindex="-1" id="edit-brand-modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Brand</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="py-1">
            <form class="form" method="POST" action="../actions/updatebrand_process.php">
        <input type="hidden" name="brand_id" id="edit-brand-id">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Edit Brand Name</label>
                            <input class="form-control" type="text" name="brand_name" id="edit-brand-name">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Save Changes</button>
            </div>
        </div>
    </form>

        </div>
      </div>
    </div>
  </div>
</div>




                  <div class="modal fade" role="dialog" tabindex="-1" id="edit-brand-modal">

</div>


                  <div class="d-flex justify-content-center">
                    <ul class="pagination mt-3 mb-0">
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
            <!-- Sidebar content -->
          </div>
          <div class="col-12 col-lg-3 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="text-center px-xl-3">
                  <button class="btn btn-success btn-block" type="button" data-toggle="modal" data-target="#user-form-modal">New Brand</button>
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

        
        <div class="modal fade" role="dialog" tabindex="-1" id="user-form-modal">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Brand</h5>
                <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="py-1">
                  <form class="form" method="POST" action="../actions/addbrand_process.php">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Brand Name</label>
                              <input class="form-control" type="text" name="brand_name">
                            </div>
                          </div>
                        </div>     
                      </div>
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                      

                        <button class="btn btn-primary" type="submit">Add Brand</button>
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
  <div class="modal fade" id="delete-brand-modal" tabindex="-1" role="dialog" aria-labelledby="deleteBrandModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteBrandModalLabel">Delete Brand</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this brand?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" id="confirm-delete-btn">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
      <div class="modal fade" id="delete-brand-modal" tabindex="-1" role="dialog" aria-labelledby="deleteBrandModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteBrandModalLabel">Delete Brand</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this brand?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" id="confirm-delete-btn">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    // JavaScript to handle delete button click
    $(document).ready(function() {
      $('.delete-brand-btn').on('click', function() {
        var brandId = $(this).data('brand-id');
        $('#delete-brand-modal').modal('show');
        
        // Pass the brandId to the delete button inside the modal
        $('#confirm-delete-btn').data('brand-id', brandId);
      });
      
      // When delete button inside the modal is clicked
      $('#confirm-delete-btn').on('click', function() {
        var brandId = $(this).data('brand-id');
        
        // Perform AJAX request to delete the brand with brandId
        $.ajax({
          url: '../actions/delete_brand.php',
          method: 'POST',
          data: { brand_id: brandId },
          success: function(response) {
            // Handle success response
            console.log('Brand deleted successfully');
            // Optionally, you can reload the page or update the brand list without reloading
          },
          error: function(xhr, status, error) {
            // Handle error response
            console.error('Error deleting brand:', error);
          }
        });
        
        // Hide the modal after deletion
        $('#delete-brand-modal').modal('hide');
      });
    });
  </script>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    $('#user-form-modal').on('show.bs.modal', function (event) {
      var modal = $(this);
      modal.find('.modal-body input[name="brand_name"]').val('');
    });
  </script>


<script type="text/javascript">
  $(document).ready(function() {
    $('.edit-brand-btn').on('click', function() {
      var brandId = $(this).data('brand-id');
      var brandName = $(this).data('brand-name');

      $('#edit-brand-id').val(brandId);
      $('#edit-brand-name').val(brandName);

      $('#edit-brand-modal').modal('show');
    });
  });
</script>



</body>
</html>
