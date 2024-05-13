<?php
//  creates an instance of the customer class and runs the methods
//connect to the user account class
include_once dirname(__DIR__).'../classes/brand_class.php';

//sanitize data

// function add_user_ctr($a,$b,$c,$d,$e,$f,$g){
// 	$adduser=new general_class();
// 	return $adduser->add_user($a,$b,$c,$d,$e,$f,$g);
// }


//--INSERT--//

function add_brand($brand_name){
	$add_brand=new brand_class();
	return $add_brand->add_brand($brand_name);
}

//--SELECT--//

//--UPDATE--//
function update_brand($brand_id, $new_brand_name) {
    $update_Brand = new brand_class(); // Create an instance of your class
    return $update_Brand->update_brand($brand_id, $new_brand_name);

}

//--Select--//
function get_brands_ctr(){
    $viewbrand = new brand_class();
    return $viewbrand->getBrands();
}

function get_brand_ctr($brand_id){
    $viewbrand =new brand_class();
    return $viewbrand->getBrandById($brand_id);
}


//--DELETE--//
function delete_brands_ctr($brand_id){
    $deletebrand = new brand_class();
    return $deletebrand->deleteBrand($brand_id);
}

?>