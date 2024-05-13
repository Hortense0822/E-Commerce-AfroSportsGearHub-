<?php
//connect to database class
require_once("../settings/db_class.php");

/**
*General class to handle all functions 
*/
/**
 *@author David Sampah
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
class general_class extends db_connection
{
	//--INSERT--//
	function add_user($username, $password,$Email,$DOB,$Telephone,$address,$Profession) {
		$sql="INSERT INTO `user`(`username`, `password`,`Email`,`DOB`,`Telephone`,`address`,`Profession`) VALUES ('$username', '$password','$Email','$DOB','$Telephone','$address','$Profession')";
		return $this->db_query($sql); //11.the db_query function is used when you want to make a change to the database. while db_fetchone or db.fetchall is when you want to select or retrieve information from a database.

		// sql = 'INSERT INTO user ({$a,$b,$c,$d,$e,$f,$g}) VALUES ({values})'
		// fields = ', '.join(query_data.keys())
		// values = ', '.join(['"{0}"'.format(value) for value in query_data.values()])
		// composed_sql = sql.format(fields=fields, values=values)
	}

	//--SELECT--//
	function verify_user($username, $password){
		$sql = "SELECT * FROM `user` WHERE `username` = '$username'";
		$result = $this->db_fetch_one($sql);
	
		// Check if there is a matching record
		if ($result != false) {
			// Login successful
			if ($password == $result['password']); 
			echo "Login successful!";
		} else {
			// Login failed
			echo "Invalid username or password";
		}
	}
	

	//--UPDATE--//



	//--DELETE--//
	

}

?>