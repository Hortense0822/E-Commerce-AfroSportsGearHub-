<?php
include_once("../controllers/cart_controller.php");
include_once("../settings/core.php");


 $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    if(isset($_GET['pid'])){
	$pid=$_GET['pid'];
	$quantity=$_GET['qty'];
    
    // ensure the user is logged in
    if (isLoggedIn()) {
        if (add_to_cart_ctr($pid,$ip,$_SESSION['id'],$quantity)==TRUE){
            header('Location:../shopping-cart.php');
        }
    } else {
        header("Location: ../view/login.php");
    }
}

?>