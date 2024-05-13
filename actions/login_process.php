<?php 
include_once('../controllers/customer_controller.php');
include_once('../settings/core.php');

$username = htmlspecialchars($_POST["username"]); 
$password = htmlspecialchars($_POST["password"]);

$result = verify_customer($username, $password);
//for login
// Check if there is a matching record
if ($result != null) {
    // Login successful
    
    if (password_verify($password, $result['customer_pass'])) {
        echo "Password is correct!";
        $_SESSION['id'] = $result['customer_id'];
        $_SESSION['role'] = $result['user_role'];

        if ($_SESSION['role'] === "1") {
            header("Location: ../view/manageproduct.php");
        } else {
            header("Location:../index.php"); //direct to the dashboard
        }
        
        } else {
        echo "Password is incorrect!";
        $_SESSION['error'] = "Password is incorrect";
        header("Location: ../view/login.php");
        }
        
        
} else {
    // Login failed
    var_dump($result);
    echo "Invalid username or password";
    $_SESSION['error'] = "Invalid username or password";
    header("Location: ../view/login.php");
}




?>