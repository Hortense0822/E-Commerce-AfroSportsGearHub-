<?php
require_once dirname(__DIR__)."../settings/db_class.php";

class cart_class extends db_connection
{
    // Other methods...

    //--Add to Cart--//
    // function add_to_cart($product_id, $quantity, $user_id) {
    //     $ndb = new db_connection();
    //     $product_id = mysqli_real_escape_string($ndb->db_conn(), $product_id);
    //     $quantity = mysqli_real_escape_string($ndb->db_conn(), $quantity);
    //     $user_id = mysqli_real_escape_string($ndb->db_conn(), $user_id);

    //     // Check if the product is already in the cart for the user
    //     $check_sql = "SELECT * FROM `cart` WHERE `product_id` = '$product_id' AND `user_id` = '$user_id'";
    //     $existing_item = $this->db_fetch_one($check_sql);

    //     if ($existing_item) {
    //         // If the product is already in the cart, update the quantity
    //         $new_quantity = $existing_item['quantity'] + $quantity;
    //         $update_sql = "UPDATE `cart` SET `quantity` = '$new_quantity' WHERE `product_id` = '$product_id' AND `user_id` = '$user_id'";
    //         return $this->db_query($update_sql);
    //     } else {
    //         // If the product is not in the cart, insert a new item
    //         $insert_sql = "INSERT INTO `cart` (`product_id`, `quantity`, `user_id`) VALUES ('$product_id', '$quantity', '$user_id')";
    //         return $this->db_query($insert_sql);
    //     }
    // }

    //--View Cart--//
   public function view_cart($user_id) {
        $ndb = new db_connection();
        $user_id = mysqli_real_escape_string($ndb->db_conn(), $user_id);

        // Select all items in the cart for the specified user
        $sql = "SELECT cart.*, products.*
                FROM cart
                INNER JOIN products ON cart.p_id = products.product_id
                WHERE cart.c_id = '$user_id'";
        return $this->db_fetch_all($sql);
    }

    public function add_to_cart($id,$ip,$cid,$quantity)
	{
		$sql="INSERT INTO cart(p_id, ip_add, c_id, qty) select '$id','$ip','$cid','$quantity' from dual WHERE NOT EXISTS(Select * from cart where p_id='$id' and c_id='$cid')";
		$this->db_query($sql);
		
		if (mysqli_affected_rows($this->db)==0){
			$sql1="UPDATE cart set qty='$quantity' where p_id='$id' and c_id='$cid'";
			return $this->db_query($sql1);
		} else{
			return $this->db_query($sql);
		}
		
	}

    public function show_cart($cid,$ip)
        {
            $sql="SELECT * from cart where c_id='$cid' ";
            return $this->db_fetch_all($sql);
        }

    public function delete_cart_item($p_id, $c_id)
    {
        // Delete the cart item with the given ID
        $sql = "DELETE FROM cart WHERE p_id='$p_id' and c_id = '$c_id'";
        return $this->db_query($sql);
    }


    ///Ordering
    public function add_order($customer_id, $invoice_no){
        $sql = "INSERT INTO `orders`(`customer_id`, `invoice_no`) VALUES ('$customer_id', '$invoice_no') ";
        
        if ($this->db_query($sql)){
            $sql = "SELECT order_id from orders ORDER BY order_date DESC LIMIT 1";
            return $this->db_fetch_one($sql)['order_id'];
        }
        return false;

    }

    public function add_order_details($order_id, $product_id, $qty, $total, $customer_id, $currency,  $payment_date, $payment_method){
        $sql = "INSERT INTO `orderdetails`(`order_id`, `product_id`, `qty`, `total`) VALUES ('$order_id', '$product_id', '$qty', '$total') ";
        $sql2 = "INSERT INTO `payment`(`order_id`, `amt`, `customer_id`, `currency`, `payment_date`, `payment_method`) VALUES ('$order_id', '$total', '$customer_id', '$currency', '$payment_date', '$payment_method')";
        // $pay = $this->db_query($sql2);
       return $this->db_query($sql) &&  $this->db_query($sql2);
    }

    public function recent_order(){
        $sql = "SELECT MAX(`order_id`) as recent FROM `orders`";
        return $this->db_query($sql);
    }

    public function get_order($order_id){
        $sql = "SELECT `users`.`username`, `orders`.`id`, `orders`.`invoice_no`, `orders`.`ord_date`, `orders`.`order_status` FROM `orders` JOIN `users` ON (`users`.`id` = `orders`.`id`) WHERE `orders`.`id`='$order_id'";
        return $this->db_query($sql);
    }

    public function get_order_details($order_id){
        $sql = "SELECT `products`.`product_name`, `products`.`product_img`, `products`.`product_price`, `order_details`.`qty`, `order_details`.`qty`*`products`.`product_price` as result FROM `order_details` JOIN `products` ON (`order_details`.`product_id` = `products`.`id`) WHERE `order_id`='$order_id'";
        return $this->db_query($sql);
    }


    //order details
   
    public function getOrderDetails() {
        $query = 'SELECT o.*, od.* FROM orders o JOIN order_details od ON o.order_id = od.order_id';
       return $this->db_fetch_all($query);
    }

    

       // Payment
    
    public function add_payment_to_order($order_id, $amt, $payment_method, $customer_id, $currency, $payment_date){
        $sql = "INSERT INTO `payment`(`order_id`, `amt`, `customer_id`, `currency`, `payment_date`, `payment_method) VALUES ('$order_id', '$amt', '$customer_id', '$currency', '$payment_date', '$payment_method')";
        return $this->db_query($sql);
    }
    


    public function get_payment_for_order($order_id){
        $sql = "SELECT * FROM `payment` WHERE `order_id`='$order_id'";
        return $this->db_query($sql);
    }
    

    
}
?>
