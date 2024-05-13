<?php
include('header_navbar.php');
include_once('functions/productview.php');
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="search_shop.php">
                                <input type="text" name="searchquery" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <li><a href="shop.php?view=equipments&type=category">Equipment</a></li>
                                                    <li><a href="shop.php?view=clothes&type=category">Clothes</a></li>
                                                    <li><a href="shop.php?view=accessories&type=category">Accessories</a></li>
                                                    <li><a href="shop.php">All Products</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                    <li><a href="shop.php?view=nike&type=brand">Nike</a></li>
                                                    <li><a href="shop.php?view=puma&type=brand">Puma</a></li>
                                                    <li><a href="shop.php?view=adidas&type=brand">Adidas</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="shop.php?start_price=0&end_price=50&type=price">$0.00 - $50.00</a></li>
                                                    <li><a href="shop.php?start_price=50&end_price=100&type=price">$50.00 - $100.00</a></li>
                                                    <li><a href="shop.php?start_price=100&end_price=150&type=price">$100.00 - $150.00</a></li>
                                                    <li><a href="shop.php?start_price=150&end_price=200&type=price">$150.00 - $200.00</a></li>
                                                    <li><a href="shop.php?start_price=200&end_price=250&type=price">$200.00 - $250.00</a></li>
                                                    <li><a href="shop.php?start_price=250&end_price=1000000&type=price">$250.00+ </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of 126 results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select>
                                        <option value="">Low To High</option>
                                        <option value="">$0 - $55</option>
                                        <option value="">$55 - $100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            $view = isset($_GET['view']) ? $_GET['view'] : 'main';
                            $type = isset($_GET['type']) ? $_GET['type'] : '#';
                            
                            if($view == 'main'){
                                view_products_user(); 
                            }   

                            else if ($type=='category' || $type=='brand'){
                                view_products_by($type, $view);
                            }
                            
                            else if ($type=='price') {
                                
                                $start_price = isset($_GET['start_price']) ? $_GET['start_price'] : '0';
                                $end_price = isset($_GET['end_price']) ? $_GET['end_price'] : '0';
                                view_products_by_price(floatVal($start_price), floatval($end_price));
                            }
                        ?>
                        <!-- Inside the loop where products are displayed -->
                        <!-- Add an ID to the cart icon -->

                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <?php
    include('footer_navbar.php');
    ?>

    <!-- Search Begin -->

    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form" action="search_shop.php">
                <input type="text" name="searchquery" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>

    <!-- Search End -->

    <!-- Js Plugins -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const addToCartForms = document.querySelectorAll(".add-to-cart-form");
        const cartIcon = document.getElementById("cart-icon");
        let cartCount = 0;

        addToCartForms.forEach(form => {
            form.addEventListener("submit", function(event) {
                event.preventDefault();
                const productId = this.querySelector('input[name="product_id"]').value;
                const quantity = parseInt(this.querySelector('input[name="quantity"]').value);

                // Perform AJAX request to add the product to the cart
                // Replace the following code with your actual AJAX request

                // Update cart count
                cartCount += quantity;
                updateCartIcon();
            });
        });

        function updateCartIcon() {
            cartIcon.textContent = `Cart (${cartCount})`;
        }
    });
</script>
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