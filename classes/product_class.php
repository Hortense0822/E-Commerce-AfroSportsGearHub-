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


// 	}
class product_class extends db_connection
{
        
	//--INSERT--//
	function addproduct($product_cat, $product_brand, $product_title, $product_price, $product_image, $product_keyword) {
        $ndb = new db_connection();
        $product_cat = mysqli_real_escape_string($ndb->db_conn(), $product_cat);
        $product_brand = mysqli_real_escape_string($ndb->db_conn(), $product_brand);
        $product_title = mysqli_real_escape_string($ndb->db_conn(), $product_title);
        $product_price = mysqli_real_escape_string($ndb->db_conn(), $product_price);
        $product_image = mysqli_real_escape_string($ndb->db_conn(), $product_image);
        $product_keyword = mysqli_real_escape_string($ndb->db_conn(), $product_keyword);


        $sql= "INSERT INTO `products`(`product_cat`, `product_brand`, `product_title`, `product_price`, `product_image`,`product_keywords`) VALUES ('$product_cat', '$product_brand', '$product_title', '$product_price', '$product_image', '$product_keyword')";
        

        return $this->db_query($sql); 
	}

    //--Update--//
	function update_product($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_keyword) {
        $sql = "UPDATE `products` SET `product_title` = '$product_title',`product_cat` = '$product_cat',`product_brand` = '$product_brand',`product_price`='$product_price', `product_keywords`= '$product_keyword' WHERE `product_id` = '$product_id'";
        return $this->db_query($sql); }

        //--select--//
        function getProductById($product_id) {
        $sql = "SELECT * FROM `products` WHERE `product_id` = '$product_id'";
        return $this->db_fetch_one($sql);
        }

        function getProducts() {
        $sql = "SELECT * FROM `products`";
        return $this->db_fetch_all($sql);
        }

        function newArrivals(){
        $sql = "SELECT `product_id` FROM `products` WHERE `date_created` >= DATE_SUB(NOW(), INTERVAL 7 DAY)";
        return $this->db_fetch_all($sql);
        }

        function hotSells(){
        
        }

        function bestSellers() {
        // Define SQL query to retrieve best sellers
        $sql = "SELECT `product_id`, COUNT(`product_id`) AS `total_purchases` 
                FROM `orders` 
                GROUP BY `product_id` 
                ORDER BY `total_purchases` DESC 
                LIMIT 10"; // Adjust the LIMIT as per your requirement to get the top N best sellers
        
        // Execute the query
        $result = $this->db_fetch_all($sql);
        
        // Return the result
        return $result;
        }
            

        function getProductsSearch($query) {
        $sql = "SELECT * FROM `products` WHERE `product_title` LIKE '$query'";
        return $this->db_fetch_all($sql);

        }

        function getProductsSearchByCategory($type, $value) {
                $sql = "SELECT p.* FROM products p 
                JOIN categories c ON p.product_cat = c.cat_id 
                WHERE c.cat_name = '$value'";

                return $this->db_fetch_all($sql);
        }

        function getProductsSearchByBrand($type, $value) {
                $sql = "SELECT p.* FROM products p 
                JOIN brands b ON p.product_brand = b.brand_id 
                WHERE b.brand_name = '$value'";

                return $this->db_fetch_all($sql);
        }

        function getProductsSearchByPrice($start_price, $end_price) {
                $sql = "SELECT * FROM `products` WHERE `product_price` BETWEEN '$start_price' AND '$end_price'";
                return $this->db_fetch_all($sql);
        }
        
        function deleteProduct($product_id) {
                $sql = "DELETE FROM `products` WHERE `product_id` = '$product_id'";
                return $this->db_query($sql);
        
                }
        

}


?>

