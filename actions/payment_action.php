<!-- <?php

include_once('../controllers/cart_controller.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are provided
    if (isset($_POST["order_id"]) && isset($_POST["amt"]) && isset($_POST["customer_id"]) && isset($_POST["currency"]) && isset($_POST["payment_date"])) {
        $order_id = $_POST["order_id"];
        $amt = $_POST["amt"];
        $customer_id = $_POST["customer_id"];
        $currency = $_POST["currency"];
        $payment_date = $_POST["payment_date"];

        $cart = new cart_class();

        // Add payment to the order
        $result = "";

        if ($result) {
            // Payment added successfully
            echo "Payment added successfully.";
        } else {
            // Error adding payment
            echo "Error adding payment.";
        }
    } else {
        echo "Please provide all required fields.";
    }
} else {
    header("Location: ../index.php");
    exit();
}
?> -->
