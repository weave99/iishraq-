<?php
include_once("include/conn.php");
require_once("sequre_page.php");


if(isset($_POST['remove_cart']))	
{
       $wishlist_id1=$_POST['wishlist_id'];
       
      $qury=mysqli_query($conn,"DELETE FROM `wishlist` WHERE wishlist_id='$wishlist_id1'");
      header("location:wishlist.php");
}


if( isset($_POST['submit']) && $_POST['submit']=='add_to_cart' )
{
    $user_name= $session_user_name;
    $prod_id= $_POST['prod_id'];
    $unit_price= $_POST['unit_price'];
    $qty= $_POST['qty'];	


    $sql3="select user_id from users where user_name='$user_name'";
    $query3=mysqli_query($conn,$sql3);
   
    $user_id=0;
    if($f=mysqli_fetch_array($query3))
        $user_id=$f['user_id'];
        
        //`cart_id`, `user_id`, `prod_id`, `unit_price`, `qty`SELECT * FROM `cart_details` WHERE 1

		$inst_query = "INSERT INTO cart_details (user_id, prod_id, unit_price, qty) VALUES ('$user_id','$prod_id','$unit_price','$qty')";
        
        
        $add = mysqli_query($conn,$inst_query);
        $wishlist_id1=$_POST['wishlist_id'];
       
      $qury=mysqli_query($conn,"DELETE FROM `wishlist` WHERE wishlist_id='$wishlist_id1'");
         
		if($add)
		{
			header("Location:cart_details.php");
		}

	
	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="css/responsive5.css">
  <link rel="stylesheet" href="css/style5.css">

    <script>
        function myFunction() {
            if (confirm("Are you sure to delete?") == true) {            
            return true;
            } else {
                return false;
                
            }
        }
    </script>
</head>

<body>
    <!-- Header Start -->
    <?php include 'header.php'; ?>
    <!-- Header End -->




    <!-- Add to cart Start-->
    <div class="container pt-4 set-position">



    <h1>My wishlist</h1>
        <div class="row pt-4">
            <div class="col-lg-12">

                <div class="row">
                    <div class="col-lg-1 p-2">
                        <b>Image</b>
                    </div>
                    <div class="col-lg-3 p-2">
                        <b>Product</b>
                    </div>
                    <div class="col-lg-2 p-2">
                        <b>Unit Price</b>
                    </div>
                    <div class="col-lg-2 p-2">
                        <b>Stock Status</b>
                    </div>
                    <div class="col-lg-3 p-2">
                     
                    </div>                   

                </div>

                <hr>


                        <?php
                        $sub_total=0;
                        //`user_id`, `name`, `street`, `city`, `country`, `postcode`, `mobile_no`, `user_name`, `password`SELECT * FROM `users` WHERE 1

                        //`cart_id`, `user_id`, `prod_id`, `unit_price`, `qty`, `color`SELECT * FROM `cart_details` WHERE 1

                        $sql3="SELECT * FROM wishlist WHERE user_id IN (select user_id from users where user_name='$session_user_name') order by wishlist_id";
                        $query3=mysqli_query($conn,$sql3);
                        $num=mysqli_num_rows($query3);
                        if($num>0)
                        {
                            while($prd=mysqli_fetch_array($query3)) 
                            {
                                $wishlist_id1=$prd['wishlist_id'];
                                $prod_id1=$prd['prod_id'];
                                $unit_price1=$prd['unit_price'];
                                $qty1=$prd['qty'];
                                
                    //`prod_id`, `category_id`, `prod_name`, `mrp`, `persent_discount`, `offer_price`, `replacement_txt`, `warranty_txt`, 
                    //`color_1`, `color_2`, `color_3`, `picture_1`, `picture_2`, `picture_3`, `feature_1`, `feature_2`, `feature_3`, 
                    //`feature_4`, `feature_5`, `feature_6`SELECT * FROM `product_details` WHERE 1

              $query4=mysqli_query($conn,"select * from product_details where prod_id=$prod_id1");
              if($f=mysqli_fetch_array($query4)) 
               {


           ?>   
          
                <div class="row pt-2">
                    <div class="col-lg-1 p-2 ">
                        <img src="images/products/<?php echo $f['picture_1'];?>" width="80px" alt="">
                    </div>
                    <div class="col-lg-3 p-2 ">
                        <h5><?php echo $f['prod_name'];?></h5>
                    </div>
                    <div class="col-lg-2 p-2">
                        <h5>₹ <?php echo $unit_price1;?></h5>
                    </div>
                    <div class="col-lg-2 p-2">
                    <button class="rounded-pill btn btn-success">In Stock</button>
                    </div>

                    
                        <div class="col-lg-2 p-2">

                            <form action="" method="post">
                                <input type="hidden" name="prod_id" value="<?php echo $prd['prod_id'];?>">
                                <input type="hidden" name="wishlist_id" value="<?php echo $wishlist_id1;?>">
                                <input type="hidden" name="qty" placeholder="1" value="<?php echo $qty1;?>">
                                <input type="hidden" name="unit_price" value="<?php echo $unit_price1;?>">
                                <button type="submit" name="submit" value="add_to_cart" class="rounded-pill btn btn-outline-dark">Add to Cart</button>
                            </form>

                        </div>   
                        <div class="col-lg-2 p-2">
                        <form action="" method="post"  onsubmit="return myFunction();">
                            <input type="hidden" name="wishlist_id" value="<?php echo $wishlist_id1;?>">

                            <button type="submit" name="remove_cart" class="btn bg-white btn-transparent"><i class="bi bi-trash-fill text-danger"  style="font-size:21px;"></i> </button>
                         </form>
                        </div>                     
                    

                </div>
                
                <hr>

                <?php
               }
            }
        ?>


            <div class="row pt-5">
                <div class="col-lg-12 col-6">
                    <div>
                        <a href="index.php" class="btn bg-dark" style="background-color:var(--primary);color:#fff;"> Continue Shopping</a>
                    </div>
                </div>
            </div>



            <?php
            }
            else
            { ?>
        
                    <div class="row">
                        <div class="col-lg-12 p-5">
                            <div class="row ">
                                <div class="col-lg-3" style="position:relative;left:50%;transform:translate(-50%,0);">
                                    <div class="text-center">
                                        <img src="images/emptycart.gif" width="100%" alt="">
                                    </div>                            
                                </div>
                            </div>

                            <h4 class="text-center">Empty Cart</h4>
                        </div>
                    </div>

            <?php
            }
            ?>
                
            </div>
        </div>
    </div>
    <!-- Add to cart End-->






    <!-- Footer Start -->
    <?php include 'footer.php'; ?>
    <!-- Footer End -->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>