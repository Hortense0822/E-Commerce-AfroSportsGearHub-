<?php
include_once('../controllers/brand_controller.php');

if (isset($_GET['brand_id'])) {
    $brand_id = $_GET['brand_id'];
      
    // Call the delete_brands_ctr() function to delete the brand
    $result = delete_brands_ctr($brand_id);
    
    if ($result) {
        // Redirect to the dashboard page if deletion is successful
        header("Location: ../view/managebrand.php");
        exit(); // Ensure no further code execution after redirection
    } else {
        // If deletion fails, you can handle it accordingly
        echo "Failed to delete brand";
    }
} else {
    // Handle the case where brand_id is not set
    echo "Brand ID not provided";
}
?>
