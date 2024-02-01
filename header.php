
<section class="sticky">
  <!------------------------------mid-nav--------------------------->
  <div class="mid-nav w-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
          <a href="index.php" class="logo"><img src="images/ionX-Products-logo-Recovered.png" alt="image" class="img-fluid"></a>
                 
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <form id="nav-form">
            <input type="text" class="form-control" placeholder="search your products">
             <a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a> 
          </form>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="logo-2">
           <a href="about.php" ><img src="images/logo-1.png" alt="image" class="img-fluid"></a>   
          </div>
        </div>
      </div>
    </div>
  </div>
  <!----------------------------------nav-bar--------------------------------->
  <nav class="navbar navbar-expand-lg  navbar-dark  my-nav" >
    <div class="container">
    <!-- Brand -->
    <!--<a class="navbar-brand my-logo" href="#"></a----->
      <div class="navbar-nav pt-3 custom-items ml-auto">

            <a href="wishlist.php"  class="mid-ico-mobile">
              <i class="bi bi-heart"></i>
              <span class="cart-num">
              <?php if(isset($_SESSION['user_name'])){  
                      $h_u=$_SESSION['user_name'];
                      $sql0="SELECT * FROM wishlist WHERE user_id IN (select user_id from users where user_name='$h_u')";
                      $query0=mysqli_query($conn,$sql0);
                      $num=mysqli_num_rows($query0);
                      echo $num;
                      }
                      else echo "0";
                ?>
              </span>      
            </a>  
            <a href="cart_details.php" class="mid-ico-mobile">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <span class="cart-num">
                <?php if(isset($_SESSION['user_name'])){  
                        $h_u=$_SESSION['user_name'];
                        $sql0="SELECT * FROM cart_details WHERE user_id IN (select user_id from users where user_name='$h_u')";
                        $query0=mysqli_query($conn,$sql0);
                        $num=mysqli_num_rows($query0);
                        echo $num;
                        }
                        else echo "0";
                  ?>
              </span>          
            </a>  

          <!--==========Login Start===================-->
          <?php if(!isset($_SESSION['user_name'])){  ?>
            <a href="user_login.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>login</span>        
            </a> 

          <!--==========Logout===================-->
          <?php } else {  
              $h_u=$_SESSION['user_name'];
              $sql1="select * from users where user_name='$h_u'";
              $query1=mysqli_query($conn,$sql1);
              $name_header="";
              if($f=mysqli_fetch_array($query1))
              $name_header=$f['name'];
              $n=strpos($name_header," ");
              if($n>0)
              $name_header=substr($name_header,0,$n);
            ?>
              <a class="dropdown">
                  <a class=" dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-user"></i>   Logout</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href=""><?php echo $name_header;?></a>
                    <a class="dropdown-item" href="">Setting</a>
                    <a class="dropdown-item" href="user_logout.php">logout</a>
                </div>
              </a>
            </a> 
            <?php  
          }
          ?>
          <!--==========Login End===================-->


  </div>   


    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>  
    <!-- Navbar links -->
    <div class="collapse navbar-collapse p-0" id="collapsibleNavbar">
      <ul class="navbar-nav my-items">
        <li class="nav-item">
         <a class="nav-link active"href="index.php">home</a>
        </li>
        <li class="nav-item">
          <div class="dropdown">
          <a class="nav-link  dropdown-toggle" href="#" role="button" data-toggle="dropdown">
            Company profile
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="about.php">About </a>            
            <a class="dropdown-item" href="warranty.php">Quality assurance (365 days warranty)</a> 
            <a class="dropdown-item" href="testimonial.php">Testimonial</a>             
          </div>
          </div>
        </li> 
        <li class="nav-item">
          <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-expanded="false">Product</a>
            <div class="dropdown-menu">
              <?php    
              //`category_id`, `category_name`SELECT * FROM `product_category` WHERE 1              
              $sql1="SELECT * FROM product_category  order by category_name";
              $query1=mysqli_query($conn,$sql1);
              while($prd=mysqli_fetch_array($query1)) 
              { 
              ?>
                <a class="dropdown-item" href="products.php?category_id=<?php echo $prd['category_id'];?>"><?php echo $prd['category_name'];?></a>
              <?php
              }
              ?>  

            <!--div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a---->
            </div>
          </div>
         </li>                      
         <li class="nav-item">
          <a class="nav-link" href="warranty.php">Quality assurance</a>
         </li>      
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
         </li>                               
      </ul>
      <ul class="navbar-nav mid-rt-items ml-auto">

        <li>
          <a href="wishlist.php"  class="mid-ico-dextop">
            <i class="bi bi-heart"></i>
            <span class="cart-num">
            <?php if(isset($_SESSION['user_name'])){  
                  $h_u=$_SESSION['user_name'];
                  $sql0="SELECT * FROM wishlist WHERE user_id IN (select user_id from users where user_name='$h_u')";
                  $query0=mysqli_query($conn,$sql0);
                  $num=mysqli_num_rows($query0);
                  echo $num;
                  }
                  else echo "0";
            ?>
            </span>      
          </a>
        </li>  
        <li>
          <a href="cart_details.php" class="mid-ico-dextop">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span class="cart-num">
            <?php if(isset($_SESSION['user_name'])){  
                  $h_u=$_SESSION['user_name'];
                  $sql0="SELECT * FROM cart_details WHERE user_id IN (select user_id from users where user_name='$h_u')";
                  $query0=mysqli_query($conn,$sql0);
                  $num=mysqli_num_rows($query0);
                  echo $num;
                  }
                  else echo "0";
            ?>
            </span>          
        </a>
      </li>

      <!--==========Login===================-->
      <?php if(!isset($_SESSION['user_name'])){  ?>
        <li>
          <a href="user_login.php">
            <i class="fa fa-user"></i>  
            <span>login</span>        
          </a>
        </li>
        <?php } else {  
          $h_u=$_SESSION['user_name'];
          $sql1="select * from users where user_name='$h_u'";
          $query1=mysqli_query($conn,$sql1);
          $name_header="";
          if($f=mysqli_fetch_array($query1))
          $name_header=$f['name'];
          $n=strpos($name_header," ");
          if($n>0)
          $name_header=substr($name_header,0,$n);
        ?>

      <!--===========logout==================-->
      <li>
          <div class="dropdown">
              <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-user"></i>   Logout</a>
              <div class="dropdown-menu">
              <a class="dropdown-item" href=""><?php echo $name_header;?></a>
              <a class="dropdown-item" href="">Setting</a>
              <a class="dropdown-item" href="user_logout.php">logout</a>
            </div>
          </div>
      </li>
      <!--==========End===================-->
      <?php  
      }
      ?>


 
      




      </ul>      
    </div>
     
    </div>
  </nav>


  </section>