
<?php
// Include the product controller file
include_once('../controllers/product_controller.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_keyword = $_POST['product_keyword'];
    echo $product_keyword;

    // Check if all required fields are filled
    if (!empty($product_cat) && !empty($product_brand) && !empty($product_title) && !empty($product_price) && !empty($product_keyword) ) {
        // Handle image upload
        $targetDirectory = '../images/products/';
        $filename = $_FILES['product_image']['name'];
        $tempname = $_FILES['product_image']['tmp_name'];
        $folder = $targetDirectory . $filename;

        // Move uploaded file to the specified folder
        if (move_uploaded_file($tempname, $folder)) {
            // File uploaded successfully
            // Insert product data into the database with the image file path
            if (add_product_ctr($product_cat, $product_brand, $product_title, $product_price, $filename, $product_keyword)) {
                // Product added successfully
                echo "Product added successfully";
                // Redirect to admin dashboard or any other page
                header("Location: ../view/manageproduct.php");
                exit();
            } else {
                // Failed to add product
                echo "Failed to add product";
            }
        } else {
            // Failed to upload file
            echo "Failed to upload file";
        }
    } else {
        // Required fields are missing
        echo "Please fill all required fields and select an image";
    }
} else {
    // Invalid request method
    echo "Invalid request method";
}
?>










