<?php
include_once('../controllers/product_controller.php');

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    

    $result = delete_product_ctr($product_id);
    
    if ($result) {
        // Respond with success message if deletion is successful
        echo "Product deleted successfully";
        header("Location: ../view/manageproduct.php");
        exit();
    } else {
        // Respond with error message if deletion fails
        echo "Failed to delete category";
    }
} else {
    // Respond with error message if cat_id is not set
    echo "Product ID not provided";
}
?>
