<?php
include_once('../controllers/brand_controller.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $brand_name = $_POST["brand_name"];
   
    // Do something with the data (e.g., store in a database)
    if (add_brand($brand_name)){
        header("Location: ../view/managebrand.php");
       


    } else{
        header("Location: ../view/managebrand.php");
    }}
    
?>