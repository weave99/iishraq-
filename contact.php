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
  <section class="abt-banner set-position">
    <div class="container">
      <div class="list">
       <a href="index.php">Home &nbsp;&nbsp;/&nbsp;&nbsp;</a> 
       <a href="contact.php">Contact</a>
      </div>
    </div>
  </section>
  <!-------------------------------contact-detail---------------------------------------->
  <section class="con-detail mt-5">
    <div class="container">
      <h2 class="con-line">get in touch with us</h2>
      <div class="row mt-5 d-md-flex justify-content-center">
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="con-box">
              <div class="ico">
                <i class="bi bi-geo-alt-fill"></i>
              </div>
              <h3>location</h3>
              <p>Ground floor, 63 Neheru Colony,<br> Kolkata - 700040, West Bengal</p>
            </div>
          </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="con-box">
            <div class="ico">
              <i class="bi bi-phone-fill"></i>
            </div>
            <h3>phone</h3>
            <p>9163459111</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="con-box">
            <div class="ico">
              <i class="bi bi-envelope-open-fill"></i>
            </div>
            <h3>email</h3>
            <p>info@iishraq.com</p>
          </div>
        </div>
    </div>

      <div class="row mt-5">
        <div class="col-lg-6 col-md-12 mb-5">
          <form id="contactForm" name="contactForm" method="POST" action="mailvalidation.php" onsubmit="return contactsubmit();">
            <div class="row">
              <div class="col-lg-6 col-md-6 pt-3">
              <label class="contact-line-2">name</label>
               <input type="text"class="form-control" name="name" id="" placeholder="your name">
               <p id="error6" class="text-danger"></p>
              </div>
               <div class="col-lg-6 col-md-6 pt-3">
                <label class="contact-line-2">contact number</label>
                <input type="tel"class="form-control" name="mob_no" id="" placeholder="your phone">
                <p id="error7" class="text-danger"></p>
               </div>
               <div class="col-lg-6 col-md-6 pt-3">
                <label class="contact-line-2">Your mail</label>
                <input type="mail"class="form-control" name="email" id="" placeholder="your mail">
                <p id="error7" class="text-danger"></p>
               </div>
               <div class="col-lg-6 col-md-6 pt-3">
                <label class="contact-line-2">Subject</label>
                <input type="text"class="form-control" name="subject" id="" placeholder="Subject">
                <p id="error7" class="text-danger"></p>
               </div>
            </div>
           <label  class="contact-line-2">message</label>
            <textarea class="form-control" name="message" id="" placeholder="write to us"></textarea>  
            
            <div class="submt-key mt-3">
              <input type="submit" name="send" value="Submit" class="btn my-bttn" >
            </div>
          
          </form>
        </div>
        <div class="col-lg-6 col-md-12">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3686.446721454286!2d88.3475131753608!3d22.487416636086856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0270e924a7e553%3A0xb2f41f856052282c!2s63%2C%20Nehru%20Colony%2C%20Ashok%20Nagar%2C%20Tollygunge%2C%20Kolkata%2C%20West%20Bengal%20700040!5e0!3m2!1sen!2sin!4v1689254391217!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

</body>
</html>