<?php

include_once('../controllers/category_controller.php'); // Adjust the path and class name accordingly

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have form fields like brand_id and brand_name in your HTML form
    $category_id = $_POST["cat_id"];
    $new_category_name = $_POST["cat_name"];

    // Validation (you can add more validation as needed)
    if (update_category($category_id, $new_category_name)) {
        header("Location: ../view/managecategory.php");
        echo 'edit successful';
        exit();
    } else {
        $_SESSION['error'] = 'Please provide all required data.';
        // header('Location: ../products_admin_dashboard.php'); 
        echo 'edit unsuccessful';
    }
} else {
    header('Location: ../products_admin_dashboard.php'); 
}

    
   
?>