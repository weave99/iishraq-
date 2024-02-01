<?php
include_once("include/conn.php");
// `id`, `name`, `street`, `city`, `country`, `postcode`, `mobile_no`, `email`, `password`SELECT * FROM `users` WHERE 1



// Get input values from the signup form
if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $postcode = $_POST['postcode'];
    $mobile_no = $_POST['mobile_no'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input (you can add more validation as per your requirements)
    if (empty($name) || empty($email) || empty($password)) {
        echo "Please fill in all the fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } 
    else {
        // Check if the email is already registered
        $checkEmailQuery = "SELECT * FROM users WHERE user_name = '$email'";
        $result = $conn->query($checkEmailQuery);

        if ($result->num_rows > 0) {
            echo '<script>alert("Email already registered. Please use a different email address.")</script>';
        }     
        else {
            // `user_id`, `name`, `street`, `city`, `country`, `postcode`, `mobile_no`, `user_name`, `password`SELECT * FROM `users` WHERE 1
            $insertQuery = "INSERT INTO users (name, street, city, country, postcode, mobile_no, user_name, password)
                            VALUES ('$name','$street','$city','$country','$postcode','$mobile_no', '$email', '$password')";

            if ($conn->query($insertQuery) === TRUE) {
              session_start();
              $_SESSION['user_name']=$email;
              //echo '<script>alert("Registration successful!")</script>';
              //echo "<script>location.href='user_login.php'</script>";
              header("Location:index.php");
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
        }
    }    
}              
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Register</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login_register2.css">
    <link href="css/payment2.css" rel="stylesheet">
</head>
<body>
<section class="gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6" style="position:relative;left:50%;transform: translate(-50%, 0);">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="images/logo-1.png"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-2 pb-1">Register new account</h4>
                </div>

                <form action="" method="post">
                  <div class="form-outline mb-2">
                    <label class="form-label" for="form2Example11">Name</label>
                    <input type="text" id="form2Example11" name="name" class="form-control"
                      placeholder="Enter name" required/>
                  </div>
                  <div class="form-outline mb-2">
                    <label class="form-label" for="form2Example11">Street Address</label>
                    <input type="text" id="form2Example11" name="street" class="form-control"
                      placeholder="Enter name" required/>
                  </div>
                  <div class="form-outline mb-2">
                    <label class="form-label" for="form2Example11">Town / City</label>
                    <input type="text" id="form2Example11" name="city" class="form-control"
                      placeholder="Enter name" required/>
                  </div>
                  <div class="form-outline mb-2">
                    <label class="form-label" for="form2Example11">State / County</label>
                    <input type="text" id="form2Example11" name="country" class="form-control"
                      placeholder="Enter name" required/>
                  </div>
                  <div class="form-outline mb-2">
                    <label class="form-label" for="form2Example11">Postcode </label>
                    <input type="text" id="form2Example11" name="postcode" class="form-control"
                      placeholder="Enter name" required/>
                  </div>
                  <div class="form-outline mb-2">
                    <label class="form-label" for="form2Example11">Mobile No</label>
                    <input type="text" id="form2Example11" name="mobile_no" class="form-control"
                      placeholder="Enter name" required/>
                  </div>
                  <div class="form-outline mb-2">
                  <label class="form-label" for="form2Example11">Email</label>
                    <input type="email" id="form2Example11" name="email" class="form-control"
                      placeholder="Email address" required/>
                  </div>
                  <div class="form-outline mb-2">
                  <label class="form-label" for="form2Example22">Password</label>
                    <input type="password" id="form2Example22" name="password" class="form-control"
                     placeholder="Create new password" required/>
                  
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input class="btn order_btn btn-block fa-lg mb-3" type="submit" name="register" value="Register" style="background-color:#000;"></input>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0" style="padding-right:10px;">Already have an account?</p>
                    <a href="user_login.php" type="button" class="btn btn-outline-dark bg-dark text-white">Log In</a>
                  </div>

                </form>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>    

</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>

$(".login").hide();
$(".register_li").addClass("active");

$(".login_li").click(function(){
  $(this).addClass("active");
  $(".register_li").removeClass("active");
  $(".login").show();
   $(".register").hide();
})

$(".register_li").click(function(){
  $(this).addClass("active");
  $(".login_li").removeClass("active");
  $(".register").show();
   $(".login").hide();
})


</script>
</body>

</html>


