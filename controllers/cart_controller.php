<?php
require_once dirname(__DIR__)."../settings/db_class.php";
include_once dirname(__DIR__).'../classes/customer_class.php';
include_once dirname(__DIR__).'../classes/cart_class.php';

//--INSERT--//

//--Add to cart--//
function add_to_cart_ctr($id,$ip,$cid,$quantity){
	$addcart=new cart_class();
	return $addcart->add_to_cart($id,$ip,$cid,$quantity);
}
function get_cart_ctr($cid,$ip){
    $viewcart = new cart_class();
    return $viewcart->show_cart($cid,$ip);
}

function get_all_carts($cid){
    $ndb = new db_connection();
        $user_id = mysqli_real_escape_string($ndb->db_conn(), $cid);

        // Select all items in the cart for the specified user
        $sql = "SELECT cart.*, products.*
                FROM cart
                INNER JOIN products ON cart.p_id = products.product_id
                WHERE cart.c_id = '$user_id'";
        return $ndb->db_fetch_all($sql);
    // $viewcart = new cart_class();
    // return $viewcart.view_cart($cid);
}

function delete_cart_ctr($id, $cid){
    $deletecart = new cart_class();
    return $deletecart -> delete_cart_item($id, $cid);
}

//orders
function add_order_ctr($customer_id, $invoice_no){
    $addorder = new cart_class();
    return $addorder -> add_order($customer_id, $invoice_no);
}

function add_order_details_ctr($order_id, $product_id, $qty, $total, $customer_id, $currency, $payment_date, $payment_method){
    $addorderdetails = new cart_class();
    return $addorderdetails -> add_order_details($order_id, $product_id, $qty, $total, $customer_id, $currency, $payment_date, $payment_method);
}

function recent_order_ctr($order_id){
    $recentorder = new cart_class();
    return $recentorder -> recent_order($order_id);
}

function get_order_ctr($order_id, $product_id, $qty){
    $getorder = new cart_class();
    return $getorder -> get_order($order_id, $product_id, $qty);
}

function get_order_details_ctr($order_id){
    $getorderdetails = new cart_class();
    return $getorderdetails -> get_order_details($order_id);
}

function get_all_order_details(){
    $getallorderdetails = new cart_class();
    return $getallorderdetails ->getOrderDetails();
}


// Payment
function add_payment_to_order_ctr($order_id, $payment_amount, $payment_method, $customer_id, $currency, $payment_date){
    $addpayment = new cart_class();
    return $addpayment -> add_payment_to_order($order_id, $payment_amount, $payment_method, $customer_id, $currency, $payment_date);
}

function get_payment_for_order_ctr($order_id){
    $getpayment = new cart_class();
    return $getpayment -> get_payment_for_order($order_id);
}

function get_user($user_id){
	$oneuser = new customer_class();
	return $oneuser->get_user_by_id($user_id);
}
?>
