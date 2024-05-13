<?php 
include_once('../controllers/customer_controller.php');

// Get user input and sanitize it
$fullname = htmlspecialchars($_POST["fullname"]); 
$email = htmlspecialchars($_POST["email"]);
$password = htmlspecialchars($_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$confirmpassword = htmlspecialchars($_POST["confirmpassword"]); 
$country = htmlspecialchars($_POST["country"] ?? "");
$city = htmlspecialchars($_POST['city'] ?? "") ;
$customer_contact = htmlspecialchars($_POST['contactnumber']?? "");
$image = $_FILES['image']['name'] ?? "";
$userrole = $_POST['userrole'] ?? "2";

// Check if user with the same email already exists
if (verify_customer($fullname, $password)) {
    echo "User already exists"; // Or you can redirect back to the registration page with an error message
} else {
    // Add the new customer if user doesn't exist
    if (add_customer($fullname, $email, $hashed_password, $country, $city, $customer_contact, $image, $userrole)) {
        header("Location:../view/login.php");
    } else {
        echo "Incorrect registration";
    }
}

// Function to check if a customer with the given email already exists
function customer_exists($email) {
    // Replace this with your actual database connection code
    $pdo = mysqli_connect(SERVER,USERNAME,PASSWD,DATABASE);
    
    // Query to check if a customer with the given email exists
    $sql = "SELECT * FROM customers WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // If a row is returned, the customer exists
    return $row ? true : false;
}

?>
