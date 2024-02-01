<?php
include_once("include/conn.php");
session_start();


if( isset($_POST['submit']) && $_POST['submit']=='Add to cart' )
{
    $user_name= $_SESSION['user_name'];
    $prod_id= $_POST['prod_id'];
    $unit_price= $_POST['unit_price'];
    $qty= $_POST['qty'];	
    $color= $_POST['color'];	


    $sql3="select user_id from users where user_name='$user_name'";
    $query3=mysqli_query($conn,$sql3);
   
    $user_id=0;
    if($f=mysqli_fetch_array($query3))
        $user_id=$f['user_id'];
        
        //`cart_id`, `user_id`, `prod_id`, `unit_price`, `qty`SELECT * FROM `cart_details` WHERE 1

		$inst_query = "INSERT INTO cart_details (user_id, prod_id, unit_price, qty) VALUES ('$user_id','$prod_id','$unit_price','$qty')";
        
        
        $add = mysqli_query($conn,$inst_query);
         
		if($add)
		{
			header("Location:cart_details.php");
		}
}


if( isset($_POST['submit']) && $_POST['submit']=='Add to wishlist' )
{
    $user_name= $_SESSION['user_name'];
    $prod_id= $_POST['prod_id'];
    $unit_price= $_POST['unit_price'];
    $qty= $_POST['qty'];	
    $color= $_POST['color'];	


    $sql3="select user_id from users where user_name='$user_name'";
    $query3=mysqli_query($conn,$sql3);
   
    $user_id=0;
    if($f=mysqli_fetch_array($query3))
        $user_id=$f['user_id'];
        
        //`wishlist_id`, `user_id`, `prod_id`, `unit_price`, `qty`SELECT * FROM `wishlist` WHERE 1

		$inst_query = "INSERT INTO wishlist (user_id, prod_id, unit_price, qty) VALUES ('$user_id','$prod_id','$unit_price','$qty')";
        
        
        $add = mysqli_query($conn,$inst_query);
         
		if($add)
		{
			header("Location:wishlist.php");
		}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iiSHRAQ</title>
   
     <!-------------------fonts------------------------------>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">    
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Bodoni+Moda:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Jost:wght@100&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,500;0,600;0,700;0,800;1,300;1,500;1,600;1,700;1,800&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Pompiere&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prata&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Schoolbell&display=swap" rel="stylesheet">
     <!---------------------------------------------------------------->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/responsive5.css">
     <link rel="stylesheet" href="css/style5.css">
 
      <!---------------for owl------------------->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <!--------------------AOS---------------------->
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
<!----------------------------Header--------------------------------->
<?php include ('header.php');?>

  <!-----------------------------------banner---------------------------------------------> 
<section class="set-position">
    <div id="demo" class="carousel slide" data-ride="carousel" >
    
      <!-- Indicators -->
      <ul class="carousel-indicators p-0">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li> 
        <li data-target="#demo" data-slide-to="2"></li>          
      </ul>
    
      <!-- The slideshow -->
      <div class="carousel-inner">
        <div class="carousel-item active">          
          <div class="ban-slide-1">
            <div class="container">
              <div class="row m-0">
                <div class="col-lg-6 col-md-12 col-sm-12"> 
                  <div class="banner-contents">
                    <h2>rockstar</h2>
                    <h3>put the world on mute</h3>                  
                    <div class="features">
                      <p><i class="bi bi-chevron-double-right"></i>Ultra sensitive microphone</p>
                      <p><i class="bi bi-chevron-double-right"></i>In-ear wireless bluetooth</p>
                      <p><i class="bi bi-chevron-double-right"></i>48 hour playtime</p>
                    </div>
                    <h5><span style="font-size:33px;"><sup>₹ </sup></span>349.00
                      <del style="font-size: 24px;margin-left: 20px;">₹499.00</del></h5>
                    <a href="products.php?category_id=3" class="banner-key">Buy now<span> <i class="bi bi-arrow-right"></i></span></a>
                    <a href="stores.php" class="banner-key" style="margin-left: 10px;">Stores near me<span> <i class="bi bi-arrow-right"></i></span></a>
                  </div>      
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="item-images"> 
                  <div class="item-img">
                    <img src="images/banner-items/rockstar.png" alt="iamge" class="img-fluid">
                  </div>
                  <div class="side-img">
                    <img src="images/com-icons/warranty.png" alt="image" class="img-fluid">
                  </div>
                </div>
                </div>
              </div>
          </div>
        </div>
        </div>
        <div class="carousel-item">
          <div class="ban-slide-2">          
              <div class="container">
                <div class="row m-0">
                  <div class="col-lg-6 col-md-12 col-sm-12"> 
                    <div class="banner-contents">
                      <h2>gold corn</h2>
                      <h3>a sound and style icon</h3>                  
                      <div class="features">
                        <p><i class="bi bi-chevron-double-right"></i>High bass earphones</p>
                        <p><i class="bi bi-chevron-double-right"></i>10mm powerful driver for stereo audio</p>
                        <p><i class="bi bi-chevron-double-right"></i>1.2m tangle free cable & 3.5mm Aux </p>
                      </div>
                      <h5 style="color:#523e29;"><span style="font-size:33px;"><sup>₹ </sup>149.00</span>                       
                      <del style="font-size: 24px;margin-left: 20px;">₹ 399.00</del></h5>
                      <a href="products.php?category_id=2" class="banner-key">Buy now<span> <i class="bi bi-arrow-right"></i></span></a>
                      <a href="stores.php" class="banner-key" style="margin-left: 10px;">Stores near me<span> <i class="bi bi-arrow-right"></i></span></a>    
                      
                    </div>      
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12"> 
                    <div class="item-images"> 
                      <div class="item-img">
                        <img src="images/banner-items/earphone.png" alt="iamge" class="img-fluid">
                      </div>
                      <div class="side-img">
                        <img src="images/com-icons/warranty.png" alt="image" class="img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
            </div>         
          </div>
        </div>

        <div class="carousel-item">
          <div class="ban-slide-3">          
              <div class="container">
                <div class="row m-0">
                  <div class="col-lg-6 col-md-12 col-sm-12"> 
                    <div class="banner-contents">
                      <h2>x-watch max</h2>
                      <h3>stylish - handy</h3>                  
                      <div class="features">
                        <p><i class="bi bi-chevron-double-right"></i>1.99" touch display</p>
                        <p><i class="bi bi-chevron-double-right"></i>320 MAH baterry</p>
                        <p><i class="bi bi-chevron-double-right"></i>Bluetooth calling smartwatch</p>
                      </div>
                      <h5 style="color:#244a4d;"><span style="font-size:33px;"><sup>₹ </sup>1799.00</span> 
                      <del style="font-size: 24px;margin-left: 20px;">₹ 3999.00</del></h5>                   
                      <a href="products.php?category_id=4" class="banner-key">Buy now<span> <i class="bi bi-arrow-right"></i></span></a>
                      <a href="stores.php" class="banner-key" style="margin-left: 10px;">Stores near me<span> <i class="bi bi-arrow-right"></i></span></a>    
                        
                    </div>      
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12"> 
                    <div class="item-images"> 
                      <div class="item-img">
                        <img src="images/banner-items/smartwatch.png" alt="iamge" class="img-fluid">
                      </div>
                      <div class="side-img">
                        <img src="images/com-icons/warranty.png" alt="image" class="img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
            </div>         
          </div>
        </div>
      </div>  
      <!-- Left and right controls -->
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span ><i class="bi bi-arrow-left"></i></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span><i class="bi bi-arrow-right"></i></span>
      </a>  
    </div>    
</section>
    
<!-----------------------------why-us------------------------------------>
<section class="why">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-6">
        <div class="box">
          <div class="icon-image mt-2" style="width: 87px;">
            <img src="images/com-icons/make-in-logo.png" alt="image" class="img-fluid">
          </div>
          <h4>MADE IN INDIA</h4>          
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <a href="warranty.php" style="display: inline-block;text-decoration: none !important;"><div class="box">
          <div class="icon-image" style="width: 54px;">
            <img src="images/com-icons/warranty.png" alt="image" class="img-fluid">
          </div>
          <h4 class="linked">365 DAYS WARRANTY</h4>
        </div></a>
      </div>
      <div class="col-lg-4 col-6">
       <div class="box">
          <div class="icon-image" style="width: 57px;">
            <img src="images/com-icons/quality.png" alt="image" class="img-fluid">
          </div>
          <h4>SUPERIOR QUALITY</h4>
        </div>
      </div>
    </div>
  </div>
</section>
<!-------------------------------advertisement---------------------------------->
<section class="prod mt-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 md-col-6 sm-col-12 advt">
        <div class="adv-img">
         <img src="images/product-descr-3.png" alt="image" class="img-fluid">                        
        </div>       
      </div>      
      <div class="col-lg-6 md-col-6 sm-col-12 advt">
        <div class="adv-img">
          <img src="images/product-descr-1.png" alt="image" class="img-fluid">
          <!--div class="hover-on" data-aos="zoom-in" data-aos-duration="1500">
            <a href="">buy now </a>
            <a href="">add to cart</a>
           </div--->
         </div>         
       
         <div class="adv-img">
          <img src="images/product-descr-2.png" alt="image" class="img-fluid">
          <!--div class="hover-on" data-aos="zoom-in" data-aos-duration="1500">
            <a href="">buy now </a>
            <a href="">add to cart</a>
           </div--->
         </div>        
      </div>      
    </div>
  </div>
</section>




  <!--==================earphone===================================-->
  <section class="earphn">
    <div class="container">
      <h2>Earphones</h2>
      <div class="row mt-3">
        <div id="owl-2" class="owl-carousel owl-theme">


        <?php
        /*`prod_id`, `category_id`, `prod_name`, `mrp`, `persent_discount`, `offer_price`, `replacement_txt`, 
        `warranty_txt`, `color_1`, `color_2`, `color_3`, `picture_1`, `picture_2`, `picture_3`, `feature_1`, 
        `feature_2`, `feature_3`, `feature_4`, `feature_5`, `feature_6`SELECT * FROM `product_details` WHERE 1     */
        
        //`category_id`, `category_name`SELECT * FROM `product_category` WHERE 1

          $sql1="SELECT * FROM product_details WHERE category_id=(select category_id from product_category where category_name='Earphones')";
          $query1=mysqli_query($conn,$sql1);
          while($prd=mysqli_fetch_array($query1)) 
          { 
          ?>
<form action="" method="post">

<input type="hidden" name="prod_id" value="<?php echo $prd['prod_id'];?>">
<input type="hidden" name="qty" placeholder="1" value="1">
<input type="hidden" name="unit_price" value="<?php echo $prd['offer_price'];?>">

          <div class="item">
            <div class="prod-box">
              <div class="prod-img">
                <img src="images/products/<?php echo $prd['picture_1'];?>" alt="image">
              </div>
              <div class="prod-details">
                <a href="warranty.php" style="display:inline-block;width: 54px;">
                  <img src="images/com-icons/warranty.png" alt="image" class="img-fluid"></a>                        
              <p class="feat-product"><?php echo $prd['prod_name'];?></p>
              <ul class="revw-stars p-0">
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
              </ul> 
              <div class="price">
                <p class="price-1"><sup>₹</sup><?php echo $prd['offer_price'];?></p> 
                <del>M.R.P. ₹<?php echo $prd['mrp'];?></del>           
              </div>
              <a href="details.php?category_id=<?php echo $prd['category_id'];?>&prod_id=<?php echo $prd['prod_id'];?>" class="view-btn">view product details</a>
              
              <div class="shop-icon">
                <button type="submit" name="submit" value="Add to cart">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </button>
               </div>
               
               <div class="shop-icons">
                  <button type="submit" name="submit" value="Add to wishlist">
                  <i class="bi bi-heart"></i>
                    </button>
                 
               </div>
               
               <div class="shop-icons-1">
                <a href="#"><i class="bi bi-shop"></i></a>
              </div>
              <div class="shop-icons-1">
                <a href="stores.php"><i class="bi bi-shop"></i></a>
              </div>
              </div>
            </div>
          </div>    
</form>         
          
          <?php
          }
          ?>  
         
      </div>
      </div>
    </div>
  </section>
  <!--================================neckband==============================-->
  <section class="earphn mt-5">
    <div class="container">
      <h2>Neckband</h2>
      <div class="row mt-3">
        <div id="owl-3" class="owl-carousel owl-theme">


        <?php
        //`prod_id`, `category_id`, `prod_name`, `mrp`, `persent_discount`, `offer_price`, `replacement_txt`, 
        //`warranty_txt`, `color_1`, `color_2`, `color_3`, `picture_1`, `picture_2`, `picture_3`, `feature_1`, 
        //`feature_2`, `feature_3`, `feature_4`, `feature_5`, `feature_6`SELECT * FROM `product_details` WHERE 1                      
          $sql2="SELECT * FROM product_details WHERE category_id=(select category_id from product_category where category_name='Neckband')";
          $query2=mysqli_query($conn,$sql2);
          while($prd=mysqli_fetch_array($query2)) 
          { 
          ?>

<form action="" method="post">

<input type="hidden" name="prod_id" value="<?php echo $prd['prod_id'];?>">
<input type="hidden" name="qty" placeholder="1" value="1">
<input type="hidden" name="unit_price" value="<?php echo $prd['offer_price'];?>">

          <div class="item">
            <div class="prod-box">
              <div class="prod-img">
                <img src="images/products/<?php echo $prd['picture_1'];?>" alt="image">
              </div>
              <div class="prod-details">
                <a href="warranty.php" style="display:inline-block;width: 54px;">
                  <img src="images/com-icons/warranty.png" alt="image" class="img-fluid"></a>                        
              <p class="feat-product"><?php echo $prd['prod_name'];?></p>
              <ul class="revw-stars p-0">
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
              </ul> 
              <div class="price">
                <p class="price-1"><sup>₹</sup><?php echo $prd['offer_price'];?></p> 
                <del>M.R.P. ₹<?php echo $prd['mrp'];?></del>           
              </div>
              <a href="details.php?category_id=<?php echo $prd['category_id'];?>&prod_id=<?php echo $prd['prod_id'];?>" class="view-btn">view product details</a>
              
              <div class="shop-icon">
               <button type="submit" name="submit" value="Add to cart">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </button>
               </div>
               <div class="shop-icons">
                    <button type="submit" name="submit" value="Add to wishlist">
                      <i class="bi bi-heart"></i>
                    </button>
               </div>
               <div class="shop-icons-1">
                <a href="#"><i class="bi bi-shop"></i></a>
              </div>
              <div class="shop-icons-1">
                <a href="stores.php"><i class="bi bi-shop"></i></a>
              </div>
              </div>
            </div>
          </div>    
</form>   
          <?php
          }
          ?>  

         
      </div>
      </div>
    </div>
  </section>
  <!-------------------------------Smartwatch----------------------------------------->
  <section class="earphn mt-5">
    <div class="container">
      <h2>Smartwatch</h2>
      <div class="row mt-3">
        <div id="owl-4" class="owl-carousel owl-theme">


        <?php
        //`prod_id`, `category_id`, `prod_name`, `mrp`, `persent_discount`, `offer_price`, `replacement_txt`, 
        //`warranty_txt`, `color_1`, `color_2`, `color_3`, `picture_1`, `picture_2`, `picture_3`, `feature_1`, 
        //`feature_2`, `feature_3`, `feature_4`, `feature_5`, `feature_6`SELECT * FROM `product_details` WHERE 1                      
          $sql3="SELECT * FROM product_details WHERE category_id=(select category_id from product_category where category_name='Smartwatch')";
          $query3=mysqli_query($conn,$sql3);
          while($prd=mysqli_fetch_array($query3)) 
          { 
          ?>

<form action="" method="post">

<input type="hidden" name="prod_id" value="<?php echo $prd['prod_id'];?>">
<input type="hidden" name="qty" placeholder="1" value="1">
<input type="hidden" name="unit_price" value="<?php echo $prd['offer_price'];?>">

      <div class="item">
            <div class="prod-box">
              <div class="prod-img">
                <img src="images/products/<?php echo $prd['picture_1'];?>" alt="image">
              </div>
              <div class="prod-details">
                <a href="warranty.php" style="display:inline-block;width: 54px;">
                  <img src="images/com-icons/warranty.png" alt="image" class="img-fluid"></a>                        
              <p class="feat-product"><?php echo $prd['prod_name'];?></p>
              <ul class="revw-stars p-0">
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
              </ul> 
              <div class="price">
                <p class="price-1"><sup>₹</sup><?php echo $prd['offer_price'];?></p> 
                <del>M.R.P. ₹<?php echo $prd['mrp'];?></del>           
              </div>
              <a href="details.php?category_id=<?php echo $prd['category_id'];?>&prod_id=<?php echo $prd['prod_id'];?>" class="view-btn">view product details</a>
              <div class="shop-icon">
                  <button type="submit" name="submit" value="Add to cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  </button>
               </div>
               <div class="shop-icons">
                    <button type="submit" name="submit" value="Add to wishlist">
                      <i class="bi bi-heart"></i>
                    </button>
               </div>
               <div class="shop-icons-1">
                <a href="#"><i class="bi bi-shop"></i></a>
              </div>
              <div class="shop-icons-1">
                <a href="stores.php"><i class="bi bi-shop"></i></a>
              </div>
              </div>
            </div>
          </div>   

</form> 
          <?php
          }
          ?>  


      </div>
      </div>
    </div>
  </section>
  <!-------------------------------TWS Earpod----------------------------------------->
  <section class="earphn mt-5">
    <div class="container">
      <h2>TWS Earpod</h2>
      <div class="row mt-3">
        <div id="owl-5" class="owl-carousel owl-theme">

        <?php
        //`prod_id`, `category_id`, `prod_name`, `mrp`, `persent_discount`, `offer_price`, `replacement_txt`, 
        //`warranty_txt`, `color_1`, `color_2`, `color_3`, `picture_1`, `picture_2`, `picture_3`, `feature_1`, 
        //`feature_2`, `feature_3`, `feature_4`, `feature_5`, `feature_6`SELECT * FROM `product_details` WHERE 1                      
          $sql4="SELECT * FROM product_details WHERE category_id=(select category_id from product_category where category_name='TWS Earpod')";
          $query4=mysqli_query($conn,$sql4);
          while($prd=mysqli_fetch_array($query4)) 
          { 
          ?>


<form action="" method="post">

<input type="hidden" name="prod_id" value="<?php echo $prd['prod_id'];?>">
<input type="hidden" name="qty" placeholder="1" value="1">
<input type="hidden" name="unit_price" value="<?php echo $prd['offer_price'];?>">


        <div class="item">
            <div class="prod-box">
              <div class="prod-img">
                <img src="images/products/<?php echo $prd['picture_1'];?>" alt="image">
              </div>
              <div class="prod-details">
                <a href="warranty.php" style="display:inline-block;width: 54px;">
                  <img src="images/com-icons/warranty.png" alt="image" class="img-fluid"></a>                        
              <p class="feat-product"><?php echo $prd['prod_name'];?></p>
              <ul class="revw-stars p-0">
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
              </ul> 
              <div class="price">
                <p class="price-1"><sup>₹</sup><?php echo $prd['offer_price'];?></p> 
                <del>M.R.P. ₹<?php echo $prd['mrp'];?></del>           
              </div>
              <a href="details.php?category_id=<?php echo $prd['category_id'];?>&prod_id=<?php echo $prd['prod_id'];?>" class="view-btn">view product details</a>
              <div class="shop-icon">
                  <button type="submit" name="submit" value="Add to cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  </button>
               </div>
               <div class="shop-icons">
                    <button type="submit" name="submit" value="Add to wishlist">
                      <i class="bi bi-heart"></i>
                    </button>
               </div>
               <div class="shop-icons-1">
                <a href="#"><i class="bi bi-shop"></i></a>
              </div>
              <div class="shop-icons-1">
                <a href="stores.php"><i class="bi bi-shop"></i></a>
              </div>
              </div>
            </div>
          </div>    


</form> 
          <?php
          }
          ?>  


      </div>
             
      </div>
      </div>
    </div>
  </section>


  <!-------------------------------Charger----------------------------------------->
  <section class="earphn mt-5">
    <div class="container">
      <h2>Charger</h2>
      <div class="row mt-3">
        <div id="owl-6" class="owl-carousel owl-theme">

        <?php
        //`prod_id`, `category_id`, `prod_name`, `mrp`, `persent_discount`, `offer_price`, `replacement_txt`, 
        //`warranty_txt`, `color_1`, `color_2`, `color_3`, `picture_1`, `picture_2`, `picture_3`, `feature_1`, 
        //`feature_2`, `feature_3`, `feature_4`, `feature_5`, `feature_6`SELECT * FROM `product_details` WHERE 1                      
          $sql5="SELECT * FROM product_details WHERE category_id=(select category_id from product_category where category_name='Chargers and Data cable')";
          $query5=mysqli_query($conn,$sql5);
          while($prd=mysqli_fetch_array($query5)) 
          { 
          ?>

<form action="" method="post">

<input type="hidden" name="prod_id" value="<?php echo $prd['prod_id'];?>">
<input type="hidden" name="qty" placeholder="1" value="1">
<input type="hidden" name="unit_price" value="<?php echo $prd['offer_price'];?>">


          <div class="item">
            <div class="prod-box">
              <div class="prod-img">
                <img src="images/products/<?php echo $prd['picture_1'];?>" alt="image">
              </div>
              <div class="prod-details">
                <a href="warranty.php" style="display:inline-block;width: 54px;">
                  <img src="images/com-icons/warranty.png" alt="image" class="img-fluid"></a>                        
              <p class="feat-product"><?php echo $prd['prod_name'];?></p>
              <ul class="revw-stars p-0">
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
              </ul> 
              <div class="price">
                <p class="price-1"><sup>₹</sup><?php echo $prd['offer_price'];?></p> 
                <del>M.R.P. ₹<?php echo $prd['mrp'];?></del>           
              </div>
              <a href="details.php?category_id=<?php echo $prd['category_id'];?>&prod_id=<?php echo $prd['prod_id'];?>" class="view-btn">view product details</a>
              <div class="shop-icon">
                  <button type="submit" name="submit" value="Add to cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  </button>
               </div>
               <div class="shop-icons">
                    <button type="submit" name="submit" value="Add to wishlist">
                        <i class="bi bi-heart"></i>
                    </button>
               </div>
               <div class="shop-icons-1">
                <a href="#"><i class="bi bi-shop"></i></a>
              </div>
              <div class="shop-icons-1">
                <a href="stores.php"><i class="bi bi-shop"></i></a>
              </div>
              </div>
            </div>
          </div>    

</form>           
          <?php
          }
          ?>  


      </div>

                 
      </div>
      </div>
    </div>
  </section>
  

  <!-------------------------------Speaker----------------------------------------->
  <section class="earphn mt-5">
    <div class="container">
      <h2>Speaker</h2>
      <div class="row mt-3">
        <div id="owl-7" class="owl-carousel owl-theme">

        <?php
        //`prod_id`, `category_id`, `prod_name`, `mrp`, `persent_discount`, `offer_price`, `replacement_txt`, 
        //`warranty_txt`, `color_1`, `color_2`, `color_3`, `picture_1`, `picture_2`, `picture_3`, `feature_1`, 
        //`feature_2`, `feature_3`, `feature_4`, `feature_5`, `feature_6`SELECT * FROM `product_details` WHERE 1                      
          $sql5="SELECT * FROM product_details WHERE category_id=(select category_id from product_category where category_name='Speakers')";
          $query5=mysqli_query($conn,$sql5);
          while($prd=mysqli_fetch_array($query5)) 
          { 
          ?>


<form action="" method="post">

<input type="hidden" name="prod_id" value="<?php echo $prd['prod_id'];?>">
<input type="hidden" name="qty" placeholder="1" value="1">
<input type="hidden" name="unit_price" value="<?php echo $prd['offer_price'];?>">


          <div class="item">
            <div class="prod-box">
              <div class="prod-img">
                <img src="images/products/<?php echo $prd['picture_1'];?>" alt="image">
              </div>
              <div class="prod-details">
                <a href="warranty.php" style="display:inline-block;width: 54px;">
                  <img src="images/com-icons/warranty.png" alt="image" class="img-fluid"></a>                        
              <p class="feat-product"><?php echo $prd['prod_name'];?></p>
              <ul class="revw-stars p-0">
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                <li><i class="fa fa-star" aria-hidden="true"></i></li>
              </ul> 
              <div class="price">
                <p class="price-1"><sup>₹</sup><?php echo $prd['offer_price'];?></p> 
                <del>M.R.P. ₹<?php echo $prd['mrp'];?></del>           
              </div>
              <a href="details.php?category_id=<?php echo $prd['category_id'];?>&prod_id=<?php echo $prd['prod_id'];?>" class="view-btn">view product details</a>
              <div class="shop-icon">
                  <button type="submit" name="submit" value="Add to cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  </button>
               </div>
               <div class="shop-icons">
                    <button type="submit" name="submit" value="Add to wishlist">
                        <i class="bi bi-heart"></i>
                    </button>
               </div>
               <div class="shop-icons-1">
                <a href="#"><i class="bi bi-shop"></i></a>
              </div>
              <div class="shop-icons-1">
                <a href="stores.php"><i class="bi bi-shop"></i></a>
              </div>
              </div>
            </div>
          </div>    


</form> 
          <?php
          }
          ?>  


      </div>

                 
      </div>
      </div>
    </div>
  </section>
  
 <!-------------------------------footer-------------------------------------->
<?php include('footer.php'); ?>



<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
AOS.init();
</script>
<script>
  $('#owl-2').owlCarousel({
   
      loop:true,
      margin:30,
      nav:true,
      dots:false,
      autoplay:true,
     
      autoplayHoverPause:true,
      autoplaySpeed:350,      
      responsive:{
        0:{
            items:1
        },
        767:{
            items:2
        },
        1199:{
            items:4
        }
      }
  })
  </script> 
  <script>
    $('#owl-3').owlCarousel({
     
        loop:true,
        margin:30,
        nav:true,
        dots:false,
        autoplay:true,
       
        autoplayHoverPause:true,
        autoplaySpeed:350,      
        responsive:{
          0:{
              items:1
          },
          767:{
              items:2
          },
          1199:{
              items:4
          }
        }
    })
    </script>
    <script>
      $('#owl-4').owlCarousel({
       
          loop:true,
          margin:30,
          nav:true,
          dots:false,
          autoplay:true,
         
          autoplayHoverPause:true,
          autoplaySpeed:350,     
          responsive:{
            0:{
                items:1
            },
            767:{
                items:2
            },
            1199:{
                items:4
            }
          }
      })
      </script>        
      <script>
        $('#owl-5').owlCarousel({
         
            loop:true,
            margin:30,
            nav:true,
            dots:false,
            autoplay:true,
            autoplayHoverPause:true,
            autoplaySpeed:350,       
            responsive:{
              0:{
                  items:1
              },
              767:{
                  items:2
              },
              1199:{
                  items:4
              }
            }
        })
        </script> 
        <script>
          $('#owl-6').owlCarousel({
           
              loop:true,
              margin:30,
              nav:true,
              dots:false,
              autoplay:true,  
              autoplayHoverPause:true,
              autoplaySpeed:350,       
              responsive:{
                0:{
                    items:1
                },
                767:{
                    items:2
                },
                1199:{
                    items:4
                }
              }
          })
          </script> 
                  <script>
          $('#owl-7').owlCarousel({
           
              loop:true,
              margin:30,
              nav:true,
              dots:false,
              autoplay:true,  
              autoplayHoverPause:true,
              autoplaySpeed:350,       
              responsive:{
                0:{
                    items:1
                },
                767:{
                    items:2
                },
                1199:{
                    items:4
                }
              }
          })
          </script>          
          <script>
    		   var container = document.getElementById("image-container");
		       function change_img(image) { 
			     container.src = image.src; 
		         }
          </script>



                   
</body>
</html>