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
    <title>IISHRAQ | About Us</title>
   
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
       <a href="about.php">About</a>
      </div>
    </div>
  </section>
  <!---------------------------------about-details----------------------------------------> 
  <section class="about-details">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p class="detail-para"><span style="font-weight: 900;font-size: 30px;">iishraq Electronic International Private Limited </span>is based in Kolkata, India.<br>It was incorporated in 2020 and has established itself as a major player in Manufacturing and Distribution 
            of Mobile accessories predominantly in audio devices.<br>
           Based out of West Bengal, they are one of the only few manufactures of mobile phone accessories in India - living the <span style="font-weight: 900;">MADE IN INDIA vision.</span>
            </p>
        </div>
      </div>
    </div>
  </section>

  <!------------------------------mission-------------------------------------------->
  <section class="about-details mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="mission">
           <h3 style="color:#000;font-weight: 700;">Our mission</h3>
            <p>Our mission is to provide quality products at the most competitive price,
               with seamless service 365 days of the year.
            </p>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="mission">
            <h3 style="color:#000;font-weight: 700;">Our vision</h3>
            <p>Our vision is to be a dominant player in the audio accessories & mobility segment by providing efficient, convenient and stylish products that create
               a blissful experience for the listener.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!------------------------------team---------------------------------------->
  <section class="team-details mt-5">
    <div class="container">
      <h5 style="color:#ffc107;text-align: center;line-height: 20px;font-weight: 700;">MEET OUR </h5>
      <h1 style="color:#000;font-size: 60px;font-weight: 900;text-align: center;">Team</h1>



      <div class="row justify-content-center">

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="team">
            <div class="mem-img">
              <img src="images/about-page/team-1.png" alt="image">
            </div>
            <p>With more than 18 years of experience in corporates like PepsiCo, Airtel. He has stepped up as an entrepreneur to live his dream of setting up a world class manufacturing unit in West Bengal.
              Under his leadership the company has not only gained recognition nationally for its “Value for Money” product portfolio but also for its social responsibilities in terms of Women Empowerment as an organization with more than 95% women employees.
              </p>
              <h3 style="font-weight: 700;">Saikat Bera </h3>
              <h4 style="color:#212529;font-size: 17px;font-weight: 600;">Founder</h4>
          </div>
        </div>

        <div class="col-lg-1 col-md-1 col-sm-1">
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="team">
            <div class="mem-img">
              <img src="images/about-page/team-3.png" alt="image">
            </div>
            <p>Accomplished Business  Leader - Ex AGM Panasonic- 
              Having robust Pan India experience in Consumer Products , Lifestyle Accessories , Mobile , IT & Retail - Bank with Top Notch Conglomerates (Panasonic , Luminous, Videocon , Samsung  ), IIM Bangalore.
              </p>
              <h3 style="font-weight: 700;">Jayanta Chatterjee </h3>
              <h4 style="color:#212529;font-size: 17px;font-weight: 600;">National Business Head
              </h4>
          </div>
        </div>
        

    
      </div>


      <div class="row justify-content-center">


        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="team">
            <div class="mem-img">
              <img src="images/about-page/team-5.png" alt="image">
            </div>
            <h3 style="font-weight: 700;">Anusila Barua</h3>
            <h4 style="color:#212529;font-size: 17px;font-weight: 600;">Director</h4>
          </div>
        </div>
        
        <div class="col-lg-1 col-md-1 col-sm-1">
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="team">
            <div class="mem-img">
              <img src="images/about-page/team-4.png" alt="image">
            </div>
            <h3 style="font-weight: 700;">Smriti Bera</h3>
            <h4 style="color:#212529;font-size: 17px;font-weight: 600;">Director</h4>
          </div>
        </div>
    
      </div>


    </div>
  </section>




    <!--------------------------------mentor------------------------------------------>
    <section class="mentor-details mt-5 mb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="mentor" data-aos="fade-right"  data-aos-duration="1500">
            <h5 style="color:#ffc107;font-weight: 700;">MEET OUR </h5>
            <h1 style="color:#000;font-size: 60px;font-weight: 900;">Mentor</h1>
            <h3 style="font-weight: 700;">ATUL JAIN</h3>
            <h4 style="color:#212529;font-size: 17px;font-weight: 600;border-bottom: 1px solid #222;padding-bottom: 8px;">Founder & CEO at TEOCO</h4>
            <p>He is driven to start corporations, not to be an entrepreneur,
               but to prove that you could build a successful business with a set of values
               and principles. His vision is to create a place where people were excited to come to work and take a certain amount of pride and joy in the success of the corporation. He has been at it for over 25 years with a combination of success and challenges.
               Overall, the journey has been joyful enough to be worthy of the challenge he took on.
            </p>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="mentor-img"  data-aos="fade-left"  data-aos-duration="1500">
            <img src="images/about-page/mentor.png" alt="image">
          </div>
        </div>
      </div>
    </div>
  </section>




  <!---------------------------------other-team-members --------------------------------->
  <section class="all-team">
    <figure><img src="images/about-page/team-all.png" alt="image" class="img-fluid"></figure>
    <div class="container">

    <!--
      <div class="row team-row ">

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="all"  data-aos="fade-right"  data-aos-duration="1500">
            <h2>Sales </h2>
            <h3>Modern Trade & E-commerce </h3>
             <h4>Headed by </h4>
             <p>Sr. Manager – Rajdeep Bose– Ex. Times Of India, INOX </p>
             <p>Manager – Sandip Sural -- Ex. Asus </p>
             <h3>General Trade </h3>
             <h4>Headed by </h4>
             <p>Sr. Manager – Arijit Bose– Ex. Micromax </p>
             <h3>Corporate Sales & OEM </h3>
             <h4>Headed by </h4>
             <p>Sr. Manager – Sourav Sengupta – Ex. Intex </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="all" data-aos="fade-right"  data-aos-duration="1800">
            <h2>Admin & Accounts </h2>
            <h3>HR & Admin. </h3>
            <h4>Headed by </h4>
             <p>Sr. Manager – Bikash Saha – Ex. Salora, MAXX Mobile </p>             
             <h3>Supply Chain Management </h3>
             <h4>Headed by </h4>
             <p>Manager – Amar Nath Ghosh  – Ex. Bigbazar</p>
             <p>Asst. Manager – Zeeshan Ansari </p>
             <h3>Accounts & MIS </h3>
             <h4>Headed by </h4>
             <p>Sr. Manager –Tapash Ghosh – Ex. Intex </p>
             <p>Asst. Manager – Bhaskar Manna </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="all" data-aos="fade-right"  data-aos-duration="2000">
           <h2>Production</h2>
          <p> A dedicated team of 140+ skilled employees 
             for a state-of-art manufacturing unit. </p> 
          <h3>Production Team </h3>   
          <p>Sr. Manager – Debashis Sen – Ex. IBM </p>
          <p>Manager – Proshanto Kr. Chanak  -- Ex. Xiaomi</p>
          <h3>Research & Development </h3>
          <p>Technical Head -- Debyendu Paul – Ex. Jio (Reliance)</p>
          <p>Supervisor – 10 </p>
          <p>Production employees – 130+ </p>
          </div>
        </div>

      </div>
    -->

    </div>
  </section>
  <!-------------------------------growth---------------------------------------->
  <!--section class="growth mt-5">
    <div class="container">
      <h1>Our growth story</h1>
      <figure><img src="images/about-page/growth-chart.png" alt="image" class="img-fluid"></figure>
    </div>
  </section-->  
  <!-----------------------------------gallery--------------------------------------->
  <section class="gallery mt-5">
    <div class="container">
      <h1 class="gal-hd">State Of Art Manufacturing Setup, Budge Budge, Kolkata</h1>
      <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-12" data-aos="zoom-in" data-aos-duration="1500">
        <div class="gal-img">
          <img src="images/gallery/img-1.png" alt="image">
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12" data-aos="zoom-in" data-aos-duration="1800">
        <div class="gal-img">
          <img src="images/gallery/img-2.png" alt="image">
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12" data-aos="zoom-in" data-aos-duration="2000">
        <div class="gal-img">
          <img src="images/gallery/img-3.png" alt="image">
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12"  data-aos="zoom-in" data-aos-duration="1500">
        <div class="gal-img">
          <img src="images/gallery/img-4.png" alt="image">
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12"  data-aos="zoom-in" data-aos-duration="1800">
        <div class="gal-img">
          <img src="images/gallery/img-5.png" alt="image">
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12"  data-aos="zoom-in" data-aos-duration="2000">
        <div class="gal-img">
          <img src="images/gallery/img-6.png" alt="image">
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12"  data-aos="zoom-in" data-aos-duration="1500">
        <div class="gal-img">
          <img src="images/gallery/img-7.png" alt="image">
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12"  data-aos="zoom-in" data-aos-duration="1800">
        <div class="gal-img">
          <img src="images/gallery/img-8.png" alt="image">
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12"  data-aos="zoom-in" data-aos-duration="2000">
        <div class="gal-img">
          <img src="images/gallery/img-9.png" alt="image">
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
</body>
</html>