<?php
include_once('../controllers/category_controller.php');

if (isset($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];
    

    // Call the delete_category_ctr() function to delete the category
    $result = delete_category_ctr($cat_id);
    
    if ($result) {
        // Respond with success message if deletion is successful
        echo "Category deleted successfully";
    } else {
        // Respond with error message if deletion fails
        echo "Failed to delete category";
    }
} else {
    // Respond with error message if cat_id is not set
    echo "Category ID not provided";
}
?>
