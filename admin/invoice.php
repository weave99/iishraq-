<?php
include_once("../include/conn.php");
$order_id=$_REQUEST['order_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>
        IONX  | DASHBOARD</title>
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <!-- GLOBAL MAINLY STYLES-->
    <link href="dashboard-source/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="dashboard-source/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="dashboard-source/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="dashboard-source/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->

    <!-- THEME STYLES-->
    <link href="dashboard-source/assets/css/main.min.css" rel="stylesheet" />
    <link href="dashboard-source/assets/css/dashboard.css" rel="stylesheet" />

    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">

<!-- Nav header side =========================================-->
            <?php include 'dashboard_header.php'; ?>
<!-- Nav header side =========================================-->


<!--=====================================-->
        <div class="content-wrapper">
<!--=====================================-->





<!--=========== START PAGE CONTENT======================================================================-->

<div class="page-content fade-in-up">



    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Invoice Details</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                </div>
                <div class="ibox-body">


                            <?php
                            $invoice_sql="SELECT * FROM customer_order WHERE order_id=$order_id";
                            $invoice_query=mysqli_query($conn,$invoice_sql);
                            if($order_details=mysqli_fetch_array($invoice_query)) 
                            { 
                                $user_id1=$order_details['user_id'];
                                $order_id1=$order_details['order_id'];
                            ?>


                            <div style="border:1px solid #000; width:60%;left:50%;transform:translate(-50%,0);position:relative;padding:2em;font-family: Arial, Helvetica, sans-serif;margin-bottom:2em;">
                                
                                <div style="border-bottom:5px solid red; display:flex; justify-content: space-between;">

                                    <div style="width:150px;">
                                    <img src="../images/ionX-Products-logo-Recovered.png" style="padding-top:1em;" width="150px" alt="">
                                    </div>

                                    <div style="width:250px;">
                                    <p>Transaction No.:  <?php echo $order_details['trans_no'];?></p>
                                    <p>Order Date : <?php echo $order_details['trans_date'];?></p>
                                    </div>

                                </div>

                                <div style="display:flex; justify-content: space-between;">

                                <div style="width:250px;">
                                    <?php
                                    //`user_id`, `name`, `street`, `city`, `country`, `postcode`, `mobile_no`, `user_name`, `password` SELECT * FROM `users` WHERE 1
                                        $users_sql="SELECT * FROM users WHERE user_id=$user_id1";
                                        $users_query=mysqli_query($conn,$users_sql);
                                        if($users_details=mysqli_fetch_array($users_query)) 
                                        { 
                                    ?>
                                    <p>Bill Address</p>
                                    <small>Name : <?php echo $users_details['name'];?></small><br>
                                    <small>Mobile No. : <?php echo $users_details['mobile_no'];?></small><br>
                                    <small>Email : <?php echo $users_details['user_name'];?></small><br>
                                    <small>Street : <?php echo $users_details['street'];?></small><br>
                                    <small>City : <?php echo $users_details['city'];?></small><br>
                                    <small>State / Country : <?php echo $users_details['country'];?></small><br>
                                    <small>Pincode : <?php echo $users_details['postcode'];?></small>
                                </div>
                                    <?php
                                        }
                                    ?>
                                <div style="width:250px;">
                                    <p>Shipping Address</p>
                                    <small>Name : <?php echo $order_details['shipping_name'];?></small><br>
                                    <small>Mobile No. : <?php echo $order_details['shipping_mobile'];?></small><br>
                                    <small>Email : <?php echo $order_details['shipping_email'];?></small><br>
                                    <small>Street : <?php echo $order_details['shipping_street'];?></small><br>
                                    <small>City : <?php echo $order_details['shipping_city'];?></small><br>
                                    <small>State / Country : <?php echo $order_details['shipping_state_country'];?></small><br>
                                    <small>Pincode : <?php echo $order_details['shipping_pin_code'];?></small>
                                
                                </div>
                                
                                </div>

                                <br>
                                <hr>

                                <table style="  border-collapse: collapse; width: 100%;">

                                <tr>
                                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;width: 50%;">Item</th>
                                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;width: 16.66%;">Qty</th>
                                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;width: 16.66%;">Price</th>
                                    <th style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;width: 16.66%;">Amount</th>
                                </tr>


                                <?php
                                    //`id`, `order_id`, `prod_id`, `unit_price`, `qty`, `color` SELECT * FROM `customer_order_details` WHERE 1
                                    $sql3="SELECT * FROM customer_order_details WHERE order_id='$order_id1'";
                                    $query3=mysqli_query($conn,$sql3);
                                    $num=mysqli_num_rows($query3);
                                    if($num>0)
                                    {
                                    $sub_total=0;
                                    while($prd=mysqli_fetch_array($query3)) 
                                    {
                                    $prod_id1=$prd['prod_id'];
                                    $unit_price1=$prd['unit_price'];
                                        $qty1=$prd['qty'];
                                        $color1=$prd['color'];


                                        $query4=mysqli_query($conn,"select * from product_details where prod_id=$prod_id1");
                                        if($f=mysqli_fetch_array($query4)) 
                                        {
                                    ?>


                                <tr>
                                    <td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;"><?php echo $f['prod_name'];?><br> <small><?php echo $color1;?></small> </td>        
                                    <td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;"> <?php echo $qty1;?></td>
                                    <td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">₹ <?php echo $unit_price1;?></td>
                                    <td style="padding: 8px;text-align: left;border-bottom: 1px solid #ddd;">₹ <?php echo number_format($unit_price1*$qty1,2);?></td>
                                                                                                            <?php $sub_total=$sub_total*1+$unit_price1*$qty1;?>
                                </tr>


                                <?php
                                        }
                                    }
                                ?>
                                





                                <tr>
                                    <td style="padding: 8px;text-align: left;">Total</td>
                                    <td style="padding: 8px;text-align: left;"></td>
                                    <td style="padding: 8px;text-align: left;"></td>
                                    <td style="padding: 8px;text-align: left;">₹<?php echo number_format($sub_total,2);?></td>
                                </tr>
                                    <?php
                                    }
                                    ?>


                                </table>

                                <br>
                                <hr>

                                <div style="display:flex; justify-content: space-between;">

                                <div style="width: 50%;">
                                    <p><b>Iishraq Electronic International Private Limited</b></p>
                                    <p>Contact Infomation</p>
                                    <small>Location : Ground floor, 63 Neheru Colony, Kolkata - 700040, West Bengal</small><br>
                                    <small>Phone : 9163459111</small><br>
                                    <small>Email : info@iishraq.com</small>
                                </div>

                                <div style="width: 33.33%;">
                                    <div style="text-align:center; margin-top:2em;">
                                    <img src="../images/signature.png" width="100%" alt="">
                                    </div>
                                    <div style="text-align:center;">
                                        <p>Authorized Signature</p>
                                    </div>

                                </div>
                                
                                </div>

                            </div>  

                            <?php
                            }
                            ?>
                              <div style="text-align:center; margin:2em;">
                              <a href="print_invoice.php?order_id=<?php echo $order_id;?>">
                                <button style="padding:8px 42px;text-align: center;
                                            text-decoration: none;
                                            display: inline-block;
                                            font-size: 16px;
                                            background-color:black;
                                            color:white;
                                            border:none;border-radius: 4px;">
                                Print</button>
                                </a>
                            </div>




                </div>
            </div>
        </div>
    </div>



</div>









<!--=========== End PAGE CONTENT======================================================================-->








<!-- Nav header side =========================================-->
        <?php include 'dashboard_footer.php'; ?>
<!-- Nav header side =========================================-->
<!--=====================================-->
        </div>
    </div>
<!--=====================================-->

    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="dashboard-source/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="dashboard-source/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="dashboard-source/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="dashboard-source/assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="dashboard-source/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="dashboard-source/assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
    <script src="dashboard-source/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
    <script src="dashboard-source/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="dashboard-source/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="dashboard-source/assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="dashboard-source/assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
</body>

</html>