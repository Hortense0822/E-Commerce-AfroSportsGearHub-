<?php
include_once dirname(__DIR__) . '../controllers/product_controller.php';

function flattenProductIds($nestedArray) {
    $productIds = [];
    foreach ($nestedArray as $item) {
        $productIds[] = $item['product_id'];
    }
    return $productIds;
}

function home_view_user() {
    $new_arrivals = get_newArrivals_ctr();
    $new_arrivals_ids = flattenProductIds($new_arrivals);
    $hot_sales = [];
    $best_sellers = [];
    // $hot_sales = get_hotSales_ctr();
    // $best_sellers = get_bestSellers_ctr();
    $products = get_products_ctr();
    
    $i = 0;
    if ($products != false) { 
        while ($i < count($products)) {
            // Determine if the current product is a new arrival, hot sale, or best seller
            $is_new_arrival = in_array($products[$i]['product_id'], $new_arrivals_ids);
            $is_hot_sale = in_array($products[$i]['product_id'], $hot_sales);
            $is_best_seller = in_array($products[$i]['product_id'], $best_sellers);
            
            // Construct the class string based on the conditions
            $class_string = 'col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix';
            if ($is_new_arrival) {
                $class_string .= ' new-arrivals';
            }
            if ($is_hot_sale) {
                $class_string .= ' hot-sales';
            }
            if ($is_best_seller) {
                $class_string .= ' best-sellers';
            }
?>

<div class="<?=$class_string;?>">
    <div class="product__item">
        <div class="product__item__pic set-bg" data-setbg="images/products/<?=$products[$i]['product_image'];?>">
            <img src="images/products/<?=$products[$i]['product_image'];?>" class="product__item__pic set-bg">    
            <?php if ($is_new_arrival): ?>
                <span class="label">New</span>
            <?php endif; ?>
            <ul class="product__hover">
                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
            </ul>
        </div>
        <div class="product__item__text">
            <h6><?=$products[$i]['product_title']; ?></h6>
            <a href="actions/addcart_process.php?pid=<?=$products[$i]['product_id'];?>" class="add-cart">+ Add To Cart</a>
            <div class="rating">
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <h5>$<?=$products[$i]['product_price']; ?></h5>
            <div class="product__color__select">
                <label for="pc-1">
                    <input type="radio" id="pc-1">
                </label>
                <label class="active black" for="pc-2">
                    <input type="radio" id="pc-2">
                </label>
                <label class="grey" for="pc-3">
                    <input type="radio" id="pc-3">
                </label>
            </div>
        </div>
    </div>
</div>
<?php 
            $i++; 
        }
    }
}
?>