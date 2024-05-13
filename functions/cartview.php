<?php
function view_cart() {
    $cart_items = get_cart_ctr($cid,$ip);
    $i = 0;
    if (!empty($cart_items)) {
        foreach ($cart_items as $item) {
?>
            <div class="cart-item">
                <p>Product ID: <?php echo $item['p_id']; ?></p>
                <p>Quantity: <?php echo $item['qty']; ?></p>
                <!-- You can include other details like product name, price, etc. here -->
            </div>
<?php
        }
    } else {
?>
        <p>Your cart is empty.</p>
<?php
    }
}
?>