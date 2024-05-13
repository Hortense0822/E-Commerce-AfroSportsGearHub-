
<?php
// Include the product controller file
include_once('../controllers/product_controller.php');
include_once('../controllers/cart_controller.php');
session_start();

if(isset($_SESSION['id'])) {
    $c_id = $_SESSION['id'];

    // Retrieve cart items for the user
    $cart_items = get_all_carts($c_id);
     // Calculate total price
     $total = 0;
     $p_id = '';
     $qty = '';
    $currency = "cedis";
    $method = "Via Paystack";
    $date = date('Y-m-d H:i:s');
     foreach ($cart_items as $item) {
         $total += $item['qty'] * $item['product_price'];
         $p_id .= $item['p_id'].'-';
         $qty .= $item['qty'].'-';
     }

} else {
    header("Location: ../view/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $invoice = mt_rand();
    

    if ($order = add_order_ctr($c_id, $invoice)) {
        // Redirect to admin dashboard or any other page

        if(add_payment_to_order_ctr($order, $total, $method, $c_id, $currency, $date)){
            echo "payment added successfully";
        }

        if (add_order_details_ctr($order, $p_id, $qty, $total, $c_id, $currency, $date, $method)) {
            header("Location: ../invoice.php");
            exit();
        }

        echo 'Failed';
    } else {
        // Failed to add product
        echo "Failed to add product";
    }
    
    
} else {
    // Invalid request method
    echo "Invalid request method";
}
?>










