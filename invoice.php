<?php
include('header_navbar.php');
include_once('controllers/cart_controller.php');
// include_once('controllers/customer_controller.php');

$user = get_user($_SESSION['id']);
// $details = get_payment_for_order_ctr()

$customer_name = $user["customer_name"];
$customer_email = $user["customer_email"];
$payment_amount = "$" . $total; 
$payment_method = "Credit Card"; 

if(isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    $cart_items = get_all_carts($user_id);
    
    // Calculate total price
    $total = 0;
    foreach ($cart_items as $item) {
        $total += $item['qty'] * $item['product_price'];
    }
} else {
    header("Location: view/login.php");
    exit();
}
?>

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form" id="print-section">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <h6 class="checkout__title">Order Receipt </h6>
                    <!-- Display customer information -->
                    <div>
                        <p><strong>Name:</strong> <?php echo $customer_name; ?></p>
                        <p><strong>Email:</strong> <?php echo $customer_email; ?></p>
                        <p><strong>Payment:</strong> <?php echo $payment_amount; ?></p>
                        <p><strong>Payment Method:</strong> <?php echo $payment_method; ?></p>
                    </div>
                </div>
                 <!-- full details -->
                <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Full Details</h4>
                            <div class="checkout__order__products">Product <span>Total</span></div>
                            <?php 
                            $index = 1;
                            foreach ($cart_items as $item){ ?>
                                <ul class="checkout__total__products">
                                    <li><?php echo $index.'. '.$item['product_title']; ?> <span><?php echo $item['qty'] * $item['product_price']; ?></span></li>
                                </ul>
                            <?php $index++; }; ?>
                            <ul class="checkout__total__all">
                                <li>Total <span>$<?php echo $total; ?></span></li>
                            </ul>
                            <form id="paymentForm">
                                <input type="hidden" name="email-address" id="email-address" value="<?php echo $user['customer_email'];?>">
                                <input type="hidden" name="amount" id="amount" value="<?php echo $total; ?>">
                                <button type="submit" class="btn btn-primary">Pay Now</button>
                            </form>
                        </div>
                    </div>

            </div>
            <!-- Print order details button -->
            <button type="button" onclick="printSection('print-section')">Print Receipt</button>
        </div>
    </div>
</section>

<!-- Js Plugins -->
<script>
    function printSection(sectionId) {
        var printContents = document.getElementById(sectionId).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>


<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src = "js/paystack.js"></script>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
