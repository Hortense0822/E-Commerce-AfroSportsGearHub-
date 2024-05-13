<?php

include_once('../controllers/brand_controller.php'); // Adjust the path and class name accordingly

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have form fields like brand_id and brand_name in your HTML form
    $brand_id = $_POST["brand_id"];
    $new_brand_name = $_POST["brand_name"];

    // Validation (you can add more validation as needed)
    if (update_brand($brand_id, $new_brand_name)) {
        // header("Location: ../products_admin_dashboard.php");
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