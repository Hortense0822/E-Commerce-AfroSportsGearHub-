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
class category_class extends db_connection
{
	 public function add_category($cat_name)
	{
		$ndb = new db_connection();	
		$cat_name =  mysqli_real_escape_string($ndb->db_conn(), $cat_name);
		// $desc =  mysqli_real_escape_string($ndb->db_conn(), $b);
		$sql="INSERT INTO `categories`(`cat_name`) VALUES ('$cat_name')";
		return $this->db_query($sql);
	}
        
        //--INSERT--//
	// function add_category($cat_name) {
        // $sql="INSERT INTO `categories`(`cat_name`) VALUES ('$cat_name')";
        // return $this->db_query($sql); 
	// }

         //--Update--//
	function update_category($cat_id, $new_cat_name) {
        $sql = "UPDATE `categories` SET `cat_name` = '$new_cat_name' WHERE `cat_id` = '$cat_id'";
        return $this->db_query($sql);
        }

        //--select--//
	function getCategoryById($cat_id) {
        $sql = "SELECT * FROM `categories` WHERE `cat_id` = '$cat_id'";
        return $this->db_fetch_one($sql);
        }

        function getCategories() {
        $sql = "SELECT * FROM `categories`";
        return $this->db_fetch_all($sql);
        }

        //Delete
        function deleteCategory($cat_id) {
	$sql = "DELETE FROM `categories` WHERE `categories`.`cat_id` = '$cat_id'";
        //$sql = "DELETE FROM `brands` WHERE `brand_id` = '$brand_id'";
        return $this->db_query($sql);

}}


?>