<?php
//connect to database class
//11.the db_query function is used when you want to make a change to the database. while db_fetchone or db.fetchall is when you want to select or retrieve information from a database.
include_once dirname(__DIR__)."../settings/db_class.php";

/**
*General class to handle all functions 
*/
/**
 *@author Hortense Berabose Umubyeyi
 *
 */

//  public function add_brand($a,$b)
// 	{
// 		$ndb = new db_connection();	
// 		$name =  mysqli_real_escape_string($ndb->db_conn(), $a);
// 		$desc =  mysqli_real_escape_string($ndb->db_conn(), $b);
// 		$sql="INSERT INTO `brands`(`brand_name`, `brand_description`) VALUES ('$name','$desc')";
// 		return $this->db_query($sql);
// 	}
class customer_class extends db_connection
{

   //--INSERT--//
	function add_customer($customer_name, $cuctomer_email, $hashed_password, $customer_country, $customer_city, $customer_contact, $customer_image, $userrole) {
        $ndb = new db_connection();
        $user_role = 2;
        $customer_name = mysqli_real_escape_string($ndb ->db_conn(), $customer_name);
        $cuctomer_email = mysqli_real_escape_string($ndb ->db_conn(), $cuctomer_email);
        $hashed_password = mysqli_real_escape_string($ndb ->db_conn(), $hashed_password);
        $customer_country = mysqli_real_escape_string($ndb ->db_conn(), $customer_country);
        $customer_city = mysqli_real_escape_string($ndb ->db_conn(), $customer_city);
        $customer_contact = mysqli_real_escape_string($ndb ->db_conn(), $customer_contact);
        $customer_image = mysqli_real_escape_string($ndb ->db_conn(), $customer_image);
        
        $sql="INSERT INTO `customer`(`customer_name`, `customer_email`,`customer_pass`,`customer_country`,`customer_city`,`customer_contact`,`customer_image`,`user_role`) VALUES ('$customer_name', '$cuctomer_email', '$hashed_password', '$customer_country', '$customer_city', '$customer_contact', '$customer_image', '$userrole')";
        return $this->db_query($sql);
	}

    //use prepared statements to prevent the SQL injection......

	//--SELECT--//
   //for login
	function verify_customer($username, $password){
		$sql = "SELECT * FROM `customer` WHERE `customer_email` = '$username'";
		$result = $this->db_fetch_one($sql);
        return $result;

	}

    function get_user_by_id($user_id){
        $sql = "SELECT * FROM `customer` WHERE `customer_id` = '$user_id'";
		$result = $this->db_fetch_one($sql);
        return $result;
    }
	

	//--UPDATE--//
    //UPDATE Customers SET ContactName='Juan';
    function update_customer($id, $fullname, $email, $country, $city, $image, $userrole){
        $sql="UPDATE `customer` SET `fullname`=$fullname, `email`=$email, `country`=$country, `city`=$city, `image`=$image, `userrole`=$userrole WHERE customer_id = $id";
        return $this ->db_query($sql);
    }


	//--DELETE--//
    //DELETE FROM Customers WHERE CustomerName='Alfreds Futterkiste';
    function delete_customer($id, $fullname, $email, $country, $city, $image, $userrole){
        $sql="DELETE FROM `customer` WHERE customer_id = $id";
        return $this ->db_query($sql);
    }
	
    //
}


?>