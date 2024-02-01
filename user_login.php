<?php
include_once("include/conn.php");
if(isset($_POST['login']))
{
    // Get input values from the login form
    $user_name = $_POST['email'];
    $userpassword = $_POST['password'];

    
    $sql="SELECT * FROM users WHERE user_name='$user_name' and password='$userpassword'";
    $query=mysqli_query($conn,$sql);
    if($r=mysqli_fetch_array($query))
    {
      session_start();
      $_SESSION['user_name']=$user_name;
      if(isset($_POST['prod_id']))
        {
          $category_id=$_POST['category_id'];
          $prod_id=$_POST['prod_id'];
          header("location:details.php?category_id=".$category_id."&prod_id=".$prod_id);
          
        }
      else
              header("location:index.php");
    }
    else{
            header("location:user_login.php?err='Invalide user'");
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title></title>
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
<section class="h-100 gradient-form" style="background-color: #eee;">
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
                  <h4 class="mt-1  pb-1">Please login to your account</h4>
                  <h5 class="text-danger mb-5"><?php if(isset($_REQUEST['err'])){echo $_REQUEST['err'];}?></h5>

                </div>

                <form action="" method="POST">
                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example11">User ID</label>
                    <input type="email" id="form2Example11" class="form-control" name="email" placeholder="Email address" />
                  </div>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example22">Password</label>
                    <input type="password" id="form2Example22" class="form-control" name="password" placeholder="Enter password"/>
                  
                  </div>


                  
                          <?php if(isset($_REQUEST['category_id']) || isset($_REQUEST['prod_id']))
                          {
                            ?>
                            <div class="form-outline mb-4">
                              <input type="hidden" name="category_id" id="category_id" value="<?php echo trim($_REQUEST['category_id']);?>" />
                              <input type="hidden" name="prod_id" id="prod_id" value="<?php echo trim($_REQUEST['prod_id']);?>" />

                            </div>
                          <?php
                          }
                          ?>

                          

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input class="btn order_btn btn-block fa-lg mb-3" type="submit" name="login" value="Log In" style="background-color:#000;"></input>
                    <a class="text-muted" href="#!">Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0" style="padding-right:10px;">Don't have an account?</p>
                    <a href="user_register.php" type="button" class="btn btn-outline-dark bg-dark text-white">Create new</a>
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


