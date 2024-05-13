<?php
//connect to the user account class
include_once("../classes/general_class.php");

//sanitize data

// function add_user_ctr($a,$b,$c,$d,$e,$f,$g){
// 	$adduser=new general_class();
// 	return $adduser->add_user($a,$b,$c,$d,$e,$f,$g);
// }


//--INSERT--//
function add_user_ctr($username, $password,$Email,$DOB,$Telephone,$address,$Profession){
	$adduser=new general_class();
	return $adduser->add_user($username, $password,$Email,$DOB,$Telephone,$address,$Profession);
}
function verify_user_ctr($username, $password){
	$verifyuser=new general_class();
	return $verifyuser->verify_user($username, $password);
}
//--SELECT--//

//--UPDATE--//

//--DELETE--//

?>