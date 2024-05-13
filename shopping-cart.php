<?php
include('header_navbar.php');
include_once('controllers/cart_controller.php');
// Start or resume the session
// session_start();

if(isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    // Retrieve cart items for the user
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

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="./shop.php">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart_items as $item): ?>
                            <tr>
                                <td class="product__cart__item">
                                    <!-- <div class="d-flex"> -->
                                        <div class="product__cart__item__pic">
                                            <img src="images/products/<?=$item['product_image'];?>" alt="product image">
                                        </div>
                                        <div class="product__cartitem__text">
                                            <h6><?php echo $item['product_title']; ?></h6>
                                            <h5><?php echo $item['product_price']; ?></h5>
                                        </div>
                                    <!-- </div> -->
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="">
                                            <input type="number" value="<?php echo $item['qty']; ?>" id="qty" onchange="QtyChange()">
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">GHC <?php echo $item['qty'] * $item['product_price']; ?></td>
                                <td class="cart__close">
                                <form action="actions/deletecart_process.php" method="GET">
                                    <input type="hidden" name="product_id" value="<?php echo $item['p_id']; ?>" id="pid">
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                                    <button type="submit" class="btn-delete"><i class="fa fa-close"></i></button>
                                </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="shop.php" class="btn btn-primary">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <!-- <div class="continue_btn update_btn">
                            <a href="#" class="btn btn-secondary"><i class="fa fa-spinner"></i> Update cart</a>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code" class="form-control">
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>$0.00</span></li>
                        <li>Total <span>$<?php echo $total; ?></span></li>
                    </ul>
                    <a href="checkout.php" class="primary-btn btn-block">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<script> 
  function QtyChange() {
    // Select the div element to watch for changes
    var targetDiv = document.getElementById("qty");

    // Get input values from the div
    var pid = document.getElementById("pid").value;
    var qty = targetDiv.value;
    
    
    // Construct the URL with input values as parameters
    var url = "./actions/updatecart.php?pid=" + encodeURIComponent(pid) + "&qty=" + encodeURIComponent(qty);
    
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
        // Update the content of the div with the response from PHP file
    //   targetDiv.innerHTML = xhr.responseText;
        // Reload the page after the content is updated
        location.reload();
    }
    };
    xhr.send();

  };
</script>

<!-- Js Plugins -->
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
