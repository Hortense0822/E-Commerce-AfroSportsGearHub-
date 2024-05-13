<?php
//  creates an instance of the customer class and runs the methods
//connect to the user account class
include_once('../classes/customer_class.php');

//sanitize data

// function add_user_ctr($a,$b,$c,$d,$e,$f,$g){
// 	$adduser=new general_class();
// 	return $adduser->add_user($a,$b,$c,$d,$e,$f,$g);
// }


//--INSERT--//

function add_customer($fullname, $email, $hashed_password, $country, $city,$customer_contact, $image, $userrole){
	$add_customer=new customer_class();
	return $add_customer->add_customer($fullname, $email, $hashed_password, $country, $city,$customer_contact, $image, $userrole);
}

//for login
function verify_customer($username, $password){
	$verifycustomer=new customer_class();
	return $verifycustomer->verify_customer($username, $password);
}


//--SELECT--//


//--UPDATE--//

//--DELETE--//

?>