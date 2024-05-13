<?php
include_once('../controllers/category_controller.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $cat_name = htmlspecialchars($_POST["cat_name"]);
   
    // Do something with the data (e.g., store in a database)
    if (add_category($cat_name)){
        header("Location: ../view/managecategory.php");
    } else{
        header("Location: ../view/managecategory.php");
    }}
    
?>









