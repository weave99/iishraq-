<?php
include_once("include/conn.php");
require_once("sequre_page.php");
?>
<?php
//`order_id`, `trans_no`, `trans_date`, `amount`, `user_id`, `txn_status`, `clnt_txn_ref`, `shipping_name`, `shipping_street`, `shipping_city`, `shipping_pin_code`, `shipping_mobile`, `shipping_email`SELECT * FROM `customer_order` WHERE 1

if()


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>VIEW DETAILS</title>
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

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="css/responsive5.css">
     <link rel="stylesheet" href="css/style5.css">
    <link href="css/payment2.css" rel="stylesheet">
</head>

<body>
    <!-- Header Start -->
    <?php include 'header.php'; ?>
    <!-- Header End -->


    <!-- Payment details Start-->
<section class="set-position">
    <div class="container pt-4">
    <h1>Shipping Address</h1>

    <form action="place_order.php" method="post">        
        <div class="row pb-4">
            <?php 
            //`user_id`, `name`, `street`, `city`, `country`, `postcode`, `mobile_no`, `user_name`, `password`SELECT * FROM `users` WHERE 1
            $sql1="select * from users where user_name='$session_user_name'";
            $query1=mysqli_query($conn,$sql1);
            if($f=mysqli_fetch_array($query1)) 
           {
            ?>

            <div class="col-lg-8">
                
                    <div class="row">
                        <div class="col-sm-6 pt-4 form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="<?php echo $f['name'];?>" >
                        </div>

                        <div class="col-sm-6 pt-4 form-group">
                            <label>Street Address <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="street" value="<?php echo $f['street'];?>" placeholder="">
                        </div>
                        <div class="col-sm-6 pt-4 form-group">
                            <label>Town / City <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="city" value="<?php echo $f['city'];?>" placeholder="">
                        </div>
                        <div class="col-sm-6 pt-4 form-group">
                            <label>State / County<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="country" value="<?php echo $f['country'];?>" placeholder="">
                        </div>
                        <div class="col-sm-6 pt-4 form-group">
                            <label>PIN Code<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="postcode" value="<?php echo $f['postcode'];?>" placeholder="">
                        </div>
                        <div class="col-sm-6 pt-4 form-group">
                            <label>Mobile No. <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="mobile_no" value="<?php echo $f['mobile_no'];?>" placeholder="">
                        </div>
                        <div class="col-sm-6 pt-4 form-group">
                            <label>Email  <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="email" value="<?php echo $f['user_name'];?>" placeholder="">
                        </div>

                    </div>
                
            </div>
            <?php
              }
            ?>
             <?php
    $gtotal=0;
    //`user_id`, `name`, `street`, `city`, `country`, `postcode`, `mobile_no`, `user_name`, `password`SELECT * FROM `users` WHERE 1

    //`cart_id`, `user_id`, `prod_id`, `unit_price`, `qty`, `color`SELECT * FROM `cart_details` WHERE 1

    $sql3="SELECT * FROM cart_details WHERE user_id IN (select user_id from users where user_name='$session_user_name') order by cart_id";
    $query3=mysqli_query($conn,$sql3);
    $num=mysqli_num_rows($query3);
    if($num>0)
    {
         while($prd=mysqli_fetch_array($query3)) 
           {
            $cart_id1=$prd['cart_id'];
            $prod_id1=$prd['prod_id'];
            $unit_price1=$prd['unit_price'];
            $qty1=$prd['qty'];
            $gtotal=$gtotal*1+$unit_price1*$qty1;
            }
    }
            ?>
            <div class="col-lg-4">
                <table>
                    <tr>
                        <th colspan="2">Your order</th>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td class="text-dark">₹<?php echo number_format($gtotal,2);?></td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td class="text-dark">₹0.00</td>
                    </tr>

                    <tr>
                        <td>Grand Total</td>
                        <td class="text-dark">₹<?php echo number_format($gtotal,2);?></td>
                        <input class="form-control" type="hidden" name="grand_total" value="<?php echo number_format($gtotal,2);?>" >

                    </tr>

                    <input type="text" name="amount" value="<?php echo $_POST['amount'];?>">
    <input type="text" name="mail_id" value="<?php echo $_POST['mail_id'];?>;?>">
        
     <input type="text" name="user_id" value="<?php echo $_POST['user_id'];?>">
     <input type="text" name="cust_name" value="<?php echo $_POST['cust_name'];?>">
    
        <input type="text" name="trans_no" value="<?php echo $_POST['trans_no'];?>">      
        

                </table><br>
                <button type="submit"  name="submit_order" class="order_btn text-center bg-dark text-white"> Place Order</button>
            </div>
        </div>
</form>


    </div>
    </div>
    
    </section>
    <!-- Payment details End-->










    <!-- Footer Start -->
    <?php include 'footer.php'; ?>
    <!-- Footer End -->


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        /* Set rates + misc */
        var taxRate = 0.05;
        var shippingRate = 15.00;
        var fadeTime = 300;


        /* Assign actions */
        $('.product-quantity input').change(function () {
            updateQuantity(this);
        });

        $('.product-removal button').click(function () {
            removeItem(this);
        });


        /* Recalculate cart */
        function recalculateCart() {
            var subtotal = 0;

            /* Sum up row totals */
            $('.product').each(function () {
                subtotal += parseFloat($(this).children('.product-line-price').text());
            });

            /* Calculate totals */
            var tax = subtotal * taxRate;
            var shipping = (subtotal > 0 ? shippingRate : 0);
            var total = subtotal + tax + shipping;

            /* Update totals display */
            $('.totals-value').fadeOut(fadeTime, function () {
                $('#cart-subtotal').html(subtotal.toFixed(2));
                $('#cart-tax').html(tax.toFixed(2));
                $('#cart-shipping').html(shipping.toFixed(2));
                $('#cart-total').html(total.toFixed(2));
                if (total == 0) {
                    $('.checkout').fadeOut(fadeTime);
                } else {
                    $('.checkout').fadeIn(fadeTime);
                }
                $('.totals-value').fadeIn(fadeTime);
            });
        }


        /* Update quantity */
        function updateQuantity(quantityInput) {
            /* Calculate line price */
            var productRow = $(quantityInput).parent().parent();
            var price = parseFloat(productRow.children('.product-price').text());
            var quantity = $(quantityInput).val();
            var linePrice = price * quantity;

            /* Update line price display and recalc cart totals */
            productRow.children('.product-line-price').each(function () {
                $(this).fadeOut(fadeTime, function () {
                    $(this).text(linePrice.toFixed(1));
                    recalculateCart();
                    $(this).fadeIn(fadeTime);
                });
            });
        }


        /* Remove item from cart */
        function removeItem(removeButton) {
            /* Remove row from DOM and recalc cart total */
            var productRow = $(removeButton).parent().parent();
            productRow.slideUp(fadeTime, function () {
                productRow.remove();
                recalculateCart();
            });
        }
    </script>

<script>
      const navbar = document.querySelector('#stikyNav');
      //let top = navbar.offsetTop;
      function stickynavbar() {
        if (window.scrollY >= 150) {    
          navbar.classList.add('sticky');
        } else {
          navbar.classList.remove('sticky');    
        }
      }
        window.addEventListener('scroll', stickynavbar);
    </script>
</body>

</html>