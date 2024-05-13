<?php

include_once dirname(__DIR__).'../controllers/product_controller.php';


//This is for the User product


function view_products_user() {
    $products = get_products_ctr();
    $i = 0;
    if ($products != false) { 
			while($i < count($products)){
			

     echo '<div class="col-lg-4 col-md-6 col-sm-6">
        <div class="product__item sale">
            <div class="product__item__pic set-bg" data-setbg="images/products/'.$products[$i]["product_image"].'">
                <img src="images/products/'.$products[$i]["product_image"].'" class="product__item__pic set-bg">
                <span class="label">Sale</span>
                <ul class="product__hover">
                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                    <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                    <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                </ul>
            </div>
            <div class="product__item__text">
                <h6>'.$products[$i]["product_title"].'</h6>
                <a href="actions/addcart_process.php?pid='.$products[$i]["product_id"].'" class="add-cart">+ Add To Cart</a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <h5>'.$products[$i]["product_price"].'</h5>
                <div class="product__color__select">
                    <label for="pc-7">
                        <input type="radio" id="pc-7">
                    </label>
                    <label class="active black" for="pc-8">
                        <input type="radio" id="pc-8">
                    </label>
                    <label class="grey" for="pc-9">
                        <input type="radio" id="pc-9">
                    </label>
                </div>
            </div>
        </div>
    </div>';

    $i++; }}} 


    
function view_products_by($type, $value) {
    if ($type == 'category') {
        $products = get_products_by_category($type, $value);
    } else if ($type == 'brand') {
        $products = get_products_by_brand($type, $value);
    } else {
        $products = get_products_by_price($type, $value);
    }
    
    $i = 0;
    if ($products != false) { 
			while($i < count($products)){
			

     echo '<div class="col-lg-4 col-md-6 col-sm-6">
        <div class="product__item sale">
            <div class="product__item__pic set-bg" data-setbg="images/products/'.$products[$i]["product_image"].'">
                <img src="images/products/'.$products[$i]["product_image"].'" class="product__item__pic set-bg">
                <span class="label">Sale</span>
                <ul class="product__hover">
                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                    <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                    <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                </ul>
            </div>
            <div class="product__item__text">
                <h6>'.$products[$i]["product_title"].'</h6>
                <a href="actions/addcart_process.php?pid='.$products[$i]["product_id"].'" class="add-cart">+ Add To Cart</a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <h5>'.$products[$i]["product_price"].'</h5>
                <div class="product__color__select">
                    <label for="pc-7">
                        <input type="radio" id="pc-7">
                    </label>
                    <label class="active black" for="pc-8">
                        <input type="radio" id="pc-8">
                    </label>
                    <label class="grey" for="pc-9">
                        <input type="radio" id="pc-9">
                    </label>
                </div>
            </div>
        </div>
    </div>';

    $i++; }}}
    
    function view_products_by_price($start, $end) {
        
        $products = get_products_by_price($start, $end);
        
        
        $i = 0;
        if ($products != false) { 
                while($i < count($products)){
                
    
         echo '<div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__item sale">
                <div class="product__item__pic set-bg" data-setbg="images/products/'.$products[$i]["product_image"].'">
                    <img src="images/products/'.$products[$i]["product_image"].'" class="product__item__pic set-bg">
                    <span class="label">Sale</span>
                    <ul class="product__hover">
                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                        <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                        <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6>'.$products[$i]["product_title"].'</h6>
                    <a href="actions/addcart_process.php?pid='.$products[$i]["product_id"].'" class="add-cart">+ Add To Cart</a>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <h5>'.$products[$i]["product_price"].'</h5>
                    <div class="product__color__select">
                        <label for="pc-7">
                            <input type="radio" id="pc-7">
                        </label>
                        <label class="active black" for="pc-8">
                            <input type="radio" id="pc-8">
                        </label>
                        <label class="grey" for="pc-9">
                            <input type="radio" id="pc-9">
                        </label>
                    </div>
                </div>
            </div>
        </div>';
    
        $i++; }}} 

?>