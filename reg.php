<?php 
include_once('settings/core.php');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AfroSportGear Hub</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->

    <!-- reg -->

    <?php include_once("header_navbar.php"); ?>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    
    <label>
      <h1 style="color: white"> REGISTER</h1>
      </label>
    
    <form action='../actions/register_process.php' method="POST" enctype="multipart/form-data">
        <h3>Register Here</h3>

        <label for="username">full name</label>
        <input type="text" placeholder="fullname" id="fullname" name="fullname">

        <label for="email">email</label>
        <input type="email" placeholder="email" id="email" name="email">

        <label for="password">password</label>
        <input type="password" placeholder="password" id="password" name="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
        
        <label for="password">confirm password</label>
        <input type="password" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword">

        <label for="country">country</label>
        <input type="text" placeholder=" enter country" aria-describedby="emailHelp" id="country" name="country">

        <label for="city">city</label>
        <input type="text" placeholder="city" id="city" name="city">

        <label for="username">contact number</label>
        <input type="text" placeholder="contact number" id="contactnumber" name="contactnumber">

        <label for="password">Upload Profile Picture</label>
        <input type="file" placeholder="image" id="image" name="image">

        
        <button>Sign UP</button>
        <div class="social">
          <div class="go"><i class="fab fa-google"></i>  Google</div>
          <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
        </div>
    </form>
</body>
<script> scr = 'js/validation.js' </script>

</html>

</body>