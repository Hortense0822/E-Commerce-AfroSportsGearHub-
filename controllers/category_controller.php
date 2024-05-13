<?php
//  creates an instance of the customer class and runs the methods
//connect to the user account class
include_once dirname(__DIR__).'../classes/category_class.php';

//sanitize data

// function add_user_ctr($a,$b,$c,$d,$e,$f,$g){
// 	$adduser=new general_class();
// 	return $adduser->add_user($a,$b,$c,$d,$e,$f,$g);
// }


//--INSERT--//

function add_category($cat_name){
	$add_category=new category_class();
	return $add_category->add_category($cat_name);
}

//--SELECT--//
function get_categories_ctr(){
    $viewcategories = new category_class();
    return $viewcategories->getCategories();
}

function get_category_ctr($cat_id){
    $viewcategory = new category_class();
    return $viewcategory ->getCategoryById($cat_id);
}


//--UPDATE--//
function update_category($cat_id, $new_brand_name) {
    $update_category = new category_class(); // Create an instance of your class
    return $update_category->update_category($cat_id, $new_brand_name);
}

//--DELETE--//
function delete_category_ctr($cat_id){
    $deletecategory = new category_class();
    return $deletecategory->deleteCategory($cat_id);
}

?>