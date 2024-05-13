<?php
//connect to database class
//11.the db_query function is used when you want to make a change to the database. while db_fetchone or db.fetchall is when you want to select or retrieve information from a database.
require_once dirname(__DIR__)."../settings/db_class.php";

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
class brand_class extends db_connection
{
	//--INSERT--//
	public function add_brand($brand_name)
	{
		$ndb = new db_connection();	
		$brand_name =  mysqli_real_escape_string($ndb->db_conn(),$brand_name);
		// $desc =  mysqli_real_escape_string($ndb->db_conn(), $b);
		$sql="INSERT INTO `brands`(`brand_name`) VALUES ('$brand_name')";
        return $this->db_query($sql); 
	}
	// function add_brand($brand_name) {
    //     $sql="INSERT INTO `brands`(`brand_name`) VALUES ('$brand_name')";
    //     return $this->db_query($sql); 
	// }

	//--Update--//
	function update_brand($brand_id, $new_brand_name) {
        $sql = "UPDATE `brands` SET `brand_name` = '$new_brand_name' WHERE `brand_id` = '$brand_id'";
        return $this->db_query($sql);
	}
	//--select--//
	function getBrandById($brand_id) {
        $sql = "SELECT * FROM `brands` WHERE `brand_id` = '$brand_id'";
        return $this->db_fetch_one($sql);
	}

	function getBrands() {
        $sql = "SELECT brand_name, brand_id FROM `brands`";
        return $this->db_fetch_all($sql);
	}

	// DELETE //
	function deleteBrand($brand_id) {
		$sql = "DELETE FROM `brands` WHERE `brands`.`brand_id` = '$brand_id'";
        //$sql = "DELETE FROM `brands` WHERE `brand_id` = '$brand_id'";
        return $this->db_query($sql);

	
}}


?>