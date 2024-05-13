<?php
// Include necessary files and functions
include_once "../controllers/product_controller.php";
include_once "../controllers/brand_controller.php";
include_once "../controllers/category_controller.php";

// Check if the product ID is provided in the query parameters
if (isset($_GET['product_id'])) {
    // Get the product ID from the query parameters
    $productId = $_GET['product_id'];

    // Fetch product details from the database based on the product ID
    $productDetails = get_product_ctr($productId); // Assuming this function retrieves product details

    // Fetch brand details using the product's brand ID
    $brandDetails = get_brand_ctr($productDetails['product_brand']); // Assuming this function retrieves brand details

    // Fetch category details using the product's category ID
    $categoryDetails = get_category_ctr($productDetails['product_cat']); // Assuming this function retrieves category details

    // Combine product details with brand and category details
    $productDetails['brand'] = $brandDetails['brand_name'];
    $productDetails['category'] = $categoryDetails['cat_name'];

    // Output the product details as JSON
    header('Content-Type: application/json');
    echo json_encode($productDetails);
} else {
    // Handle the case when the product ID is not provided
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(array('error' => 'Product ID is missing'));
}
?>