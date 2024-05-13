<?php
//  creates an instance of the customer class and runs the methods
//connect to the user account class
include_once dirname(__DIR__).'../classes/product_class.php';

//sanitize data

// function add_user_ctr($a,$b,$c,$d,$e,$f,$g){
// 	$adduser=new general_class();
// 	return $adduser->add_user($a,$b,$c,$d,$e,$f,$g);
// }


//--INSERT--//

function add_product_ctr($product_cat, $product_brand, $product_title, $product_price,$product_image, $product_keyword){
	$add_product= new product_class();
	return $add_product->addproduct($product_cat, $product_brand, $product_title, $product_price,$product_image, $product_keyword);
}

//--SELECT--//
function get_products_ctr(){
    $viewproducts = new product_class();
    return $viewproducts->getProducts();
}

function get_products_by_category($type, $search){
    $viewproducts = new product_class();
    return $viewproducts->getProductsSearchByCategory($type, $search);
}

function get_products_by_brand($type, $search){
    $viewproducts = new product_class();
    return $viewproducts->getProductsSearchByBrand($type, $search);
}

function get_products_by_price($start_price, $end_price){
    $viewproducts = new product_class();
    return $viewproducts->getProductsSearchByPrice($start_price, $end_price);
}

//--SELECT--//
function get_search_ctr($query){
    $viewproducts = new product_class();
    return $viewproducts->getProductsSearch($query);
}


function get_product_ctr($product_id){
    $viewproduct = new product_class();
    return $viewproduct -> getProductById($product_id);
}

function delete_product_ctr($product_id){
    $viewproduct = new product_class();
    return $viewproduct -> deleteProduct($product_id);
}

function get_newArrivals_ctr(){
    $newArrival = new product_class();
    return $newArrival ->newArrivals();
}

function get_bestSellers_ctr(){
    $newbestsellers = new product_class();
    return $newbestsellers ->bestSellers();
}

//--UPDATE--//
function update_product_ctr($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_keyword) {
    $update_product = new product_class(); // Create an instance of your class
    return $update_product->update_product($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_keyword);
}

//--DELETE--//

?>