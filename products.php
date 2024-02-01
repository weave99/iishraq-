<?php
include_once("include/conn.php");
session_start();
$category_id=$_REQUEST['category_id'];


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
  <title>IISHRAQ | Products</title>

  <!-------------------fonts------------------------------>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link
    href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Bodoni+Moda:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Jost:wght@100&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,500;0,600;0,700;0,800;1,300;1,500;1,600;1,700;1,800&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Pompiere&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prata&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Schoolbell&display=swap"
    rel="stylesheet">
  <!---------------------------------------------------------------->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/responsive5.css">
  <link rel="stylesheet" href="css/style5.css">

  <!---------------for owl------------------->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
    integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <a href="">
          <?php echo $prd['category_name'];?>
        </a>
      </div>
    </div>
  </section>
  <?php
    }
    ?>



  <!---------------------------------product--------------------------------------->


  <section class="earphone mt-5">
    <div class="container">
      <div class="row">

        <?php    
        /*`prod_id`, `category_id`, `prod_name`, `mrp`, `persent_discount`, `offer_price`, `replacement_txt`, 
        `warranty_txt`, `color_1`, `color_2`, `color_3`, `picture_1`, `picture_2`, `picture_3`, `feature_1`, 
        `feature_2`, `feature_3`, `feature_4`, `feature_5`, `feature_6`SELECT * FROM `product_details` WHERE 1     */

          //`category_id`, `category_name`SELECT * FROM `product_category` WHERE 1              
          $sql2="SELECT * FROM product_details WHERE category_id=$category_id";
          $query2=mysqli_query($conn,$sql2);
          while($prd=mysqli_fetch_array($query2)) 
          { 
          ?>


          <div class="col-lg-3 col-md-6 col-sm-12">

            <form action="" method="post">

            <input type="hidden" name="prod_id" value="<?php echo $prd['prod_id'];?>">
            <input type="hidden" name="qty" placeholder="1" value="1">
            <input type="hidden" name="unit_price" value="<?php echo $prd['offer_price'];?>">


            <div class="prod-box">
              <div class="prod-img">
                <img src="images/products/<?php echo $prd['picture_1'];?>" alt="image">
              </div>
              <div class="sh-icons">
                <button type="submit" name="submit" value="Add to cart">
                  <i class="fa fa-shopping-cart" aria-hidden="true" ></i>
                </button>

                <button type="submit" name="submit" value="Add to wishlist">
                  <i class="bi bi-heart"></i>
                </button>

                <a href="https://nearby.hotspotstore.com/location/west-bengal"><i class="bi bi-shop"></i></a>
              </div>

              <div class="prod-details">
                <p class="feat-product">
                  <?php echo $prd['prod_name'];?>
                </p>
                <ul class="revw-stars p-0">
                  <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  <li><i class="fa fa-star" aria-hidden="true"></i></li>
                </ul>
                <div class="price">
                  <p class="price-1">₹
                    <?php echo $prd['offer_price'];?>
                  </p>
                </div>
                <a href="details.php?category_id=<?php echo $prd['category_id'];?>&prod_id=<?php echo $prd['prod_id'];?>"
                  class="view-btn">view product details</a>

              </div>
            </div>
        </form>

          </div>



        <?php
          }
          ?>

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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
    integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    AOS.init();
  </script>
  <script>
    $('#owl-2').owlCarousel({

      loop: true,
      margin: 30,
      nav: true,
      dots: false,
      autoplay: true,
      autoplaySpeed: 500,
      responsive: {
        0: {
          items: 1
        },
        767: {
          items: 2
        },
        1199: {
          items: 4
        }
      }
    })
  </script>
  <script>
    $('#owl-3').owlCarousel({

      loop: true,
      margin: 30,
      nav: true,
      dots: false,
      autoplay: true,
      autoplaySpeed: 500,
      responsive: {
        0: {
          items: 1
        },
        767: {
          items: 2
        },
        1199: {
          items: 4
        }
      }
    })
  </script>
  <script>
    $('#owl-4').owlCarousel({

      loop: true,
      margin: 30,
      nav: true,
      dots: false,
      autoplay: true,
      autoplaySpeed: 500,
      responsive: {
        0: {
          items: 1
        },
        767: {
          items: 2
        },
        1199: {
          items: 4
        }
      }
    })
  </script>
  <script>
    $('#owl-5').owlCarousel({

      loop: true,
      margin: 30,
      nav: true,
      dots: false,
      autoplay: true,
      autoplaySpeed: 500,
      responsive: {
        0: {
          items: 1
        },
        767: {
          items: 2
        },
        1199: {
          items: 4
        }
      }
    })
  </script>
</body>

</html>