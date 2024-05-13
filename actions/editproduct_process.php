<?php
include_once('../controllers/product_controller.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['productId'];
    echo $productId;

    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_keyword = $_POST['product_keyword'];

    if (!empty($productId) && !empty($product_cat) && !empty($product_brand) && !empty($product_title) && !empty($product_price) && !empty($product_keyword)) {
        if (update_product_ctr($productId, $product_cat, $product_brand, $product_title, $product_price, $product_keyword)) {
            echo "Product updated successfully";
            header("Location: ../view/manageproduct.php");
            exit();
        } else {
            echo "Failed to update product";
        }
    } else {
        // Required fields are missing
        echo "Please fill all required fields";
    }
} else {
    // Invalid request method
    echo "Invalid request method";
}
?>
