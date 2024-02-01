<?php
include_once("include/conn.php");
require_once("sequre_page.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IISHRAQ | Replacement</title>
   
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
       <a href="replacement.php">Warranty</a>
      </div>
    </div>
  </section>
 <!----------------------------------warranty-------------------------------->
<section id="divprint ">



 <section class="warranty">
   <div class="container">
    <div class="warranty-icon">
      <img src="images/com-icons/warranty.png" alt="images" class="img-fluid">
    </div>   
    <h1 class="testi-hdng">MADE IN INDIA</h1>
    <h3 class="warrn-hd">World-class quality assurance with <span style="font-size: 24px;font-weight: 700;border-bottom: 1px solid #000;">365 days warranty</span> on every product.</h3>
    <h4 class="testi-hd" style="margin:30px 0 ;">Please take a print of this Warranty Token <br>and courier it along with
      the damaged product<br> to the address below to claim replacement of product.
    </h4>




<?php  
    $claim_id=$_REQUEST['claim_id'];
    $sql="SELECT * FROM claim_warranty WHERE claim_id='$claim_id'";
    $query=mysqli_query($conn,$sql);
    //`claim_id`, `name`, `email`, `mob_no`, `address`, `local_retailer`, `invoice_no`, `invoice_picture`, 
    //`tocken_no`SELECT * FROM `claim_warranty` WHERE 1
    if($data=mysqli_fetch_array($query)){

    }
?>

    <div class="row"> 
      
    <div class="col-lg-6 col-md-8 col-sm-12 border" style="position:relative;left:50%;transform:translate(-50%,0);">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
          <b>Name : <?php echo $data['name'];?></b>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
          <b>Email : <?php echo $data['email'];?></b>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
          <b>Mobile No. : <?php echo $data['mob_no'];?></b>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
          <b>Address : <?php echo $data['address'];?></b>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
          <b>Retailer : <?php echo $data['local_retailer'];?></b>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
          <b>Invoice Number : <?php echo $data['invoice_no'];?></b>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-3">
          <b>Retailer : <?php echo $data['local_retailer'];?></b>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 pt-3 pb-4">
          <b>Token No. : <?php echo $data['tocken_no'];?></b>
        </div>

    </div>


      <div class="row">
        <div class="col-lg-4">
            <button class="btn btn-dark pl-5 pr-5" id="print" onclick="print()"> Print</button>          
        </div>

      
      </div>
    </div>


       
    </div>
   </div>
 </section>
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


<script>

function print () {
 var printDiv = document.getElementById("divprint");
 var printWindow = window.open('', '', 'left=0, top=0, width=1000, height=500, toolbar=0, scrollbars=0, status=0');
 printWindow.document.write(printDiv.innerHTML);
 printWindow.document.close();
 printWindow.focus();
 printWindow.print();
}


</script>
</body>
</html>