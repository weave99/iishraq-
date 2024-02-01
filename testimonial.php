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
    <title>IISHRAQ | Testimonial</title>
   
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
       <a href="testimonial.php">Testimonial</a>
      </div>
    </div>
  </section>
 <!-----------------------------------testimonial--------------------------------------->
  <section class="testimonial mt-5">
    <div class="container">
      <h4 class="testi-hd">98.5% CLIENT SATISFACTION RATE!</h4>
      <h1 class="testi-hdng">Here are few of their testimonials</h1>
      <div class="row mt-5">
       <div id="owl-7" class="owl-carousel owl-theme">
         <div class="item">
          <div class="testi-box">
            <i class="fa fa-quote-right" aria-hidden="true"></i>
            <p class="line-10">Gallant effort made to start mobile accessories manufacturing unit in
               West Bengal. </p>
            <div class="client-img">
              <img src="images/testimonial/img-1.png" alt="image" class="img-fluid">
            </div>
            <p class="line-11">Sanjay Kalirona </p>
            <p class="line-12">Co Founder & CEO at Gizmore </p>
          </div>
         </div>
         <div class="item">
          <div class="testi-box">
            <i class="fa fa-quote-right" aria-hidden="true"></i>
            <p class="line-10">Best wishes to Iishraq Electronics on the launch of their new product line </p>
            <div class="client-img">
              <img src="images/testimonial/img-3.png" alt="image" class="img-fluid">
            </div>
            <p class="line-11">Praveen Srivastava </p>
            <p class="line-12">Co-Founder - Play Design Labs </p>
          </div>
         </div>
         <div class="item">
          <div class="testi-box">
            <i class="fa fa-quote-right" aria-hidden="true"></i>
            <p class="line-10">IonX offers good products at great prices. </p>
            <div class="client-img">
              <img src="images/testimonial/img-2.png" alt="image" class="img-fluid">
            </div>
            <p class="line-11">Chiranjib Sarkar </p>
            <p class="line-12">Business Head at Mafe </p>
          </div>
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