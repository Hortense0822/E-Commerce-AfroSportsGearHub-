
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <link rel="stylesheet" href="../css/register_customer.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    
</head>
<body>
  

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


