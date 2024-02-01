<?php
include_once("include/conn.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IISHRAQ | Store</title>
   
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
  <section class="abt-banner set-position">
    <div class="container">
      <div class="list">
       <a href="index.php">Home &nbsp;&nbsp;/&nbsp;&nbsp;</a> 
       <a href="stores.php">Our Stores</a>
      </div>
    </div>
  </section>
 <!----------------------------------warranty-------------------------------->
 <section class="warranty mt-5">
   <div class="container">
     <div class="row">
      <div class="col-lg-12">
        <div class="bar">
         <p>Find a store nearby</p>
         <a href=""><i class="bi bi-map-fill"></i></a>
        </div>
      </div>
     </div>
     <form action="" method="post" id="storeform">
     <div class="row mt-5">   
      
     

       <div class="col-lg-3 col-md-6 col-sm-12  form-group">
          <label>State <span class="text-danger">*</span></label>
          <input list="browsers1"  class="form-control"   name="state" id="state" value="<?php if(isset($_REQUEST['xedit'])) {echo $state;}?>"    onKeyUp="convert_data_to_upper(this);"  placeholder="Select state" />
          <datalist id="browsers1">
              <?php
	          //`store_id`, `store_name`, `store_address`, `store_picture`, `state`, `city`, `locality`SELECT * FROM `store_details` WHERE 1
	          $q=mysqli_query($conn,"select  Distinct state  from store_details order by state");
              while($f=mysqli_fetch_array($q))
                  {
                  ?>
                      <option value="<?php echo $f['state'];?>">
                  <?php
                  }
                  ?>
          </datalist>            
       </div>




       <div class="col-lg-3 col-md-6 col-sm-12 form-group">
       <label>City<span class="text-danger">*</span></label>
            <input list="browsers2"  class="form-control"   name="city" id="city" value="<?php if(isset($_REQUEST['xedit'])) {echo $city;}?>"   onKeyUp="convert_data_to_upper(this);"  placeholder="Select city"  />
            <datalist id="browsers2">
                <?php
              //`store_id`, `store_name`, `store_address`, `store_picture`, `state`, `city`, `locality`SELECT * FROM `store_details` WHERE 1
              $q=mysqli_query($conn,"select  Distinct city  from store_details order by city");
                while($f=mysqli_fetch_array($q))
                    {
                    ?>
                        <option value="<?php echo $f['city'];?>">
                    <?php
                    }
                    ?>
            </datalist> 
       </div>


       <div class="col-lg-3 col-md-6 col-sm-12 form-group">
       <label>Locality <span class="text-danger">*</span></label>
          <input list="browsers3"  class="form-control" name="locality" id="locality"  value="<?php if(isset($_REQUEST['xedit'])) {echo $locality;}?>"  onKeyUp="convert_data_to_upper(this);"  placeholder="Select locality"/>
          <datalist id="browsers3">
              <?php
	          //`store_id`, `store_name`, `store_address`, `store_picture`, `state`, `city`, `locality`SELECT * FROM `store_details` WHERE 1
	          $q=mysqli_query($conn,"select  Distinct locality  from store_details order by locality");
              while($f=mysqli_fetch_array($q))
                  {
                  ?>
                      <option value="<?php echo $f['locality'];?>">
                  <?php
                  }
                  ?>
          </datalist> 
       </div>


          <div class="col-lg-3 col-md-6 col-sm-12">
              <label>&nbsp;</label>
            <button type="submit" name="submit" class="btn custom-btn"><i class="bi bi-search"></i>Search</button>
          </div>
    </div>
  </form>
      <!-------------------------------------------------->

     <!------------------------------------------->

 </section>
 <!--------------------------------------stores-------------------------------------------->


 
  <section class="stores">
    <div class="container">
      <h2 class="line-11">Stores near you </h2>

      <div class="row">

      <?php
 if(isset($_POST['submit']))
{
//`store_id`, `store_name`, `store_address`, `mob_no`, `opening_time`, `store_picture`, `state`, `city`, 
//`locality`SELECT * FROM `store_details` WHERE 1

  $state=trim($_POST['state']);
	$city=trim($_POST['city']);
	$locality=trim($_POST['locality']);

  $q="select * from store_details ";
  $kflag=0;

  if($state!="")
   {
     if($kflag==0)
        {
          $q=$q."  where state='$state' ";
          $kflag=1;
        }
    else
          $q=$q."  and  state='$state' ";
  }

  if($city!="")
   {
     if($kflag==0)
        {
          $q=$q."  where city='$city' ";
          $kflag=1;
        }
    else
          $q=$q."  and  city='$city' ";
  }


  if($locality!="")
   {
     if($kflag==0)
        {
          $q=$q."  where locality='$locality' ";
          $kflag=1;
        }
    else
          $q=$q."  and  locality='$locality' ";
  }

 
	$q=$q."  order by state,city,locality ";

  $qre=mysqli_query($conn,$q);
		   while($fetch=mysqli_fetch_array($qre))
			{
        //`store_id`, `store_name`, `store_address`, `mob_no`,
        // `opening_time`, `store_picture`, `state`, `city`, `locality`SELECT * FROM `store_details` WHERE 1
			    ?> 


  
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="box-body">
            <div class="share-box">
              <p><?php echo $fetch['store_name'];?></p>
            </div>
            <a href="#" class="store-ad"><i class="bi bi-geo-alt-fill"></i>
             <span style="margin-left: 10px;"><?php echo $fetch['store_address'].", ".$fetch['locality'].", ".$fetch['city'].", ".$fetch['state'];?></span>
            </a>
            <a href="#" class="store-ad"><i class="bi bi-telephone-fill"></i>
              <span><?php echo $fetch['mob_no'];?></span>
            </a>
            <a href="#" class="store-ad"><i class="bi bi-clock-fill"></i>
              <span><?php echo $fetch['opening_time'];?></span>
            </a>

          </div> 
        </div>
        <?php
      }
      ?>



<!--
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="box-body">
            <div class="share-box">
              <p>Stores near me </p>
              <a href="#"><i class="bi bi-share-fill"></i></a>
            </div>
            <a href="#" class="store-ad"><i class="bi bi-geo-alt-fill"></i>
             <span style="margin-left: 10px;"> 70 Grand Trunk Road, Baghbazar Chowmatha, Chandan Nagar, Hooghly, West Bengal 712136</span>
            </a>
            <a href="#" class="store-ad"><i class="bi bi-telephone-fill"></i>
              <span>0900 7071 162 </span>
            </a>
            <a href="#" class="store-ad"><i class="bi bi-clock-fill"></i>
              <span>10:00 AM to 09:30 PM</span>
            </a>
            <p class="line-10">Open now</p>
            <div class="card-buttns">
              <a href="#" style="background:#ffc107;"><i class="bi bi-globe2"></i> Website</a>
              <a href="#" style="background:#222;"><i class="bi bi-send"></i> Get directions</a>
            </div>
          </div>           
        </div>
-->


          </div>           
        </div>
        <?php
}
?>
      </div>
      
      <div class="row mt-5">
        <div class="col-lg-12">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117925.21697361018!2d88.26478051474216!3d22.535564847220954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f882db4908f667%3A0x43e330e68f6c2cbc!2sKolkata%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1690304978903!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
         <script>
          $('#owl-7').owlCarousel({
           
              loop:true,
              margin:10,
              stagePadding:80,
              nav:true,
              dots:false,
              autoplay:true,
              autoplaySpeed:500,      
              responsive:{
                0:{
                    items:1
                },
                767:{
                    items:1
                },
                1199:{
                    items:1
                }
              }
          })
          </script>   

</body>
</html>