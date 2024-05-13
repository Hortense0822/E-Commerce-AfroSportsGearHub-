<?php
// Include the cart controller file
// include_once('../controllers/cart_controller.php');

// // Check if ID is provided
// if(isset($_POST['p_id'])) {
//     // Get the ID of the cart item to be deleted
//     $id = $_POST['p_id'];


//     // Call the delete_cart function
//     $result = delete_cart_ctr($id, $_SESSION['id']);

//     // Check if deletion was successful
//     if($result) {
//         // Deletion successful, redirect or display success message
//         header("Location: cart.php"); // Redirect to cart page or any other page
//         exit();
//     } else {
//         // Deletion failed, handle error
//         echo "Failed to delete cart item.";
//     }
// } else {
//     // ID not provided, handle error
//     echo "Cart item ID not provided.";
// }


// Include the cart controller file
include_once('../controllers/cart_controller.php');

// Start or resume the session
session_start();

// Check if product ID and user ID are provided
if(isset($_GET['product_id']) && isset($_GET['user_id'])) {
    // Get the product ID and user ID
    $id = $_GET['product_id'];
    $user_id = $_GET['user_id'];

    echo "$id";

    // Call the delete_cart function
    $result = delete_cart_ctr($id, $user_id);

    // Check if deletion was successful
    if($result) {
        // Deletion successful, redirect to cart page
        header("Location: ../shopping-cart.php");
        exit();
    } else {
        // Deletion failed, handle error
        echo "Failed to delete cart item.";
    }
} else {
    // IDs not provided, handle error
    echo "Product ID or User ID not provided.";
}


?>
