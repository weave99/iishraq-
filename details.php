<?php
include_once("include/conn.php");
//require_once("sequre_page.php");
session_start();
if(!isset($_SESSION['user_name']))
{
  /*if(isset($_REQUEST['category_id']) || isset($_REQUEST['prod_id']))
      {
        header("location:user_login.php?category_id=".$_REQUEST['category_id']."&prod_id=".$_REQUEST['prod_id']);
      }
  else 
        header("location:user_login.php");
	*/
      
}



else
  {
      $session_user_name=$_SESSION['user_name'];
  }






$category_id=$_REQUEST['category_id'];
$prod_id=$_REQUEST['prod_id'];
// ==================== Cart Form here ============================
if( isset($_POST['submit']) && $_POST['submit']=='Buy now' )
{
    $user_name= $session_user_name;
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

		$inst_query = "INSERT INTO cart_details (user_id, prod_id, unit_price, qty, color) VALUES ('$user_id','$prod_id','$unit_price','$qty', '$color')";
        
        
        $add = mysqli_query($conn,$inst_query);
         
		if($add)
		{
			header("Location:cart_details.php");
		}

	
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IISHRAQ | Product Details</title>
   
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
  <?php
    $sql1="SELECT category_id,category_name FROM product_category WHERE category_id=$category_id";
    $query1=mysqli_query($conn,$sql1);
    if($prd=mysqli_fetch_array($query1)) 
        //`prod_id`, `category_id`, `prod_name`, `mrp`, `persent_discount`, `offer_price`, `replacement_txt`, 
        //`warranty_txt`, `color_1`, `color_2`, `color_3`, `picture_1`, `picture_2`, `picture_3`, `feature_1`, 
        //`feature_2`, `feature_3`, `feature_4`, `feature_5`, `feature_6`SELECT * FROM `product_details` WHERE 1     
    {?>
  <section class="abt-banner set-position">
    <div class="container">
      <div class="list">
       <a href="index.php">Home &nbsp;&nbsp;/&nbsp;&nbsp;</a> 
       <a href="details.php"><?php echo $prd['category_name'];?></a>
      </div>
    </div>
  </section>  
  <?php
    }
    ?>
  <!---------------------------------product-details-------------------------------------->
  <?php
    $sql3="SELECT * FROM product_details WHERE prod_id=$prod_id";
    $query3=mysqli_query($conn,$sql3);
    if($prd=mysqli_fetch_array($query3)) 
        //`prod_id`, `category_id`, `prod_name`, `mrp`, `persent_discount`, `offer_price`, `replacement_txt`, 
        //`warranty_txt`, `color_1`, `color_2`, `color_3`, `picture_1`, `picture_2`, `picture_3`, `feature_1`, 
        //`feature_2`, `feature_3`, `feature_4`, `feature_5`, `feature_6`SELECT * FROM `product_details` WHERE 1     
    {?>
  <section class="description mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-12">
          <div class="card">
            <main>              
                <div class="top-section">
                  <img id="image-container" src="images/products/<?php echo $prd['picture_1'];?>" width="100%" alt="image">
                </div>            

            <div class="nav">   

              <img onclick="change_img(this)" src="images/products/<?php echo $prd['picture_1'];?>" alt="image">        
              <img onclick="change_img(this)" src="images/products/<?php echo $prd['picture_2'];?>" alt="image">       
              <img onclick="change_img(this)" src="images/products/<?php echo $prd['picture_3'];?>" alt="image">   

            </div>
            </main>
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
        <?php
          $sql0="SELECT category_id,category_name FROM product_category WHERE category_id=$category_id";
          $query0=mysqli_query($conn,$sql0);
          if($cate=mysqli_fetch_array($query0)) 
          {?>
          <h3 class="line-9"><?php echo $cate['category_name'];?></h3>
          <?php
          }
          ?>
          <h4 style="font-size:45px; font-weight: 700;line-height: 1.1;"><?php echo $prd['prod_name'];?>
            <span class="desico"><img src="images/com-icons/warranty.png" alt="image"class="img-fluid"></span>
          </h4>  
          
          
          
          <form action="" method="post" id="quan">                
            <p class="line-7"><span style="color:red;margin-right: 10px;">-<?php echo $prd['persent_discount'];?> </span><sup>₹ </sup><?php echo $prd['offer_price'];?></p>
            <input type="hidden" name="unit_price" value="<?php echo $prd['offer_price'];?>">

            <del style="color: #7a7a7a;font-weight: 600;margin-right: 20px;">M.R.P. ₹ <?php echo $prd['mrp'];?></del> 
            <p style="font-weight: 600;">Inclusive of all taxes.</p> 
            <p style="font-weight: 800;"><i class="bi bi-check2-circle" style="color:#ffc107;margin-right: 10px;" ></i><?php echo $prd['replacement_txt'];?></p>           
            <p style="font-weight: 800;"><i class="bi bi-check2-circle" style="color:#ffc107;margin-right: 10px;" ></i><?php echo $prd['warranty_txt'];?></p> 
            <div class="d-flex">
                <h4 style="color: #000;font-size: 20px;font-weight: 600;margin-right: 60px;">Color</h4>
                <select name="color">
                  <option value="<?php echo $prd['color_1'];?>"><?php echo $prd['color_1'];?></option>
                  <option value="<?php echo $prd['color_2'];?>"><?php echo $prd['color_2'];?></option>
                  <option value="<?php echo $prd['color_3'];?>"><?php echo $prd['color_3'];?></option>
                </select>
           </div>
           <div class="d-flex mt-3">
              <input type="hidden" name="prod_id" value="<?php echo $prd['prod_id'];?>">

              <label>Quantity</label> &nbsp; &nbsp;
              <div class="form-group">
                <input type="number" class="my-number" name="qty" placeholder="1" value="1">              
              </div>            
          </div>

            <div class="d-flex">
              <div class="location">
                <a href="#"><i class="bi bi-shop" style="margin-right: 10px;"></i>Visit our stores</a>
              </div>
                <div class="buy">           
                  <input class="buy-btn" type="submit" name="submit"  value="Buy now">
                </div>        
            </div>
          </form>


          
          <p style="font-size:24px;font-weight: 600;color: #7a7a7a;margin-top: 10px;">Features:</p>
           <ul class="line-8" style="list-style-type:none;">
            <li></i><?php echo $prd['feature_1'];?></li>  
            <li></i><?php echo $prd['feature_2'];?></li>
            <li></i><?php echo $prd['feature_3'];?></li>
            <li></i><?php echo $prd['feature_4'];?></li>
            <li></i><?php echo $prd['feature_5'];?></li>
            <li></i><?php echo $prd['feature_6'];?></li>
           </ul>   
          <div class="social">
            <label>Share:</label>
            <a href="javascript:void(0)"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="javascript:void(0)"><i class="bi bi-twitter"></i></a>
            <a href="javascript:void(0)"><i class="bi bi-instagram"></i></a> 
          </div>         
        </div>
      </div>
    </div>
  </section>
  <?php
    }
    ?>
  
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
      autoplaySpeed:500,      
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
        autoplaySpeed:500,      
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
          autoplaySpeed:500,      
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
            autoplaySpeed:500,      
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
         </script>         
         <script>
          var container = document.getElementById("image-container");
          function change_img(image) { 
          container.src = image.src; 
            }
         </script>
       
</body>
</html>