<?php
include_once("../include/conn.php");
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






<!--=========== Start Indigator Bar===============================-->
            <div class="row pt-2 text-center" style="background-color:#00a7f3; color:#fff; font-width:700;">
                <div class="col-lg-12">
                   <h4> DASHBOARD </h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== START PAGE CONTENT======================================================================-->
        <div class="page-content fade-in-up">

            <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">
                                    <?php 
                                    //`order_id`, `trans_no`, `trans_date`, `amount`, `user_id`, `txn_status`, `clnt_txn_ref`, `shipping_name`, `shipping_street`, `shipping_city`, `shipping_state_country`, `shipping_pin_code`, `shipping_mobile`, `shipping_email` 
                                    //SELECT * FROM `customer_order` WHERE 1
                                    $order_sql = "SELECT * FROM customer_order where txn_status='PAID'";
                                    $order_result = mysqli_query($conn, $order_sql); 
                                    // Return the number of rows in result set
                                    $order_rowcount = mysqli_num_rows( $order_result );
                                    //	Display result
                                    printf("%d\n", $order_rowcount);
                                    ?>
                                </h2>
                                <div class="m-b-5">NEW ORDERS</div><i class="ti-shopping-cart widget-stat-icon"></i>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="ibox bg-warning color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">
                                    <?php
                                    //`order_id`, `trans_no`, `trans_date`, `amount`, `user_id`, `txn_status`, `clnt_txn_ref`, `shipping_name`, `shipping_street`, `shipping_city`, `shipping_state_country`, `shipping_pin_code`, `shipping_mobile`, `shipping_email` 
                                    //SELECT * FROM `customer_order` WHERE 1
                                    $amount_sql="SELECT sum(amount) as amt FROM customer_order where txn_status='PAID'";
                                    $amount_query=mysqli_query($conn,$amount_sql);
                                    if($amount_details=mysqli_fetch_array($amount_query)) 
                                    { ?>
                                        ₹ <?php echo $amount_details['amt'];?>
                                    <?php
                                    }
                                    ?>
                                    
                                
                                </h2>
                                <div class="m-b-5">TOTAL INCOME</div><i class="ti-bar-chart widget-stat-icon"></i>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="ibox bg-danger color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">
                                    <?php 
                                      //`user_id`, `name`, `street`, `city`, `country`, `postcode`, `mobile_no`, `user_name`, `password` SELECT * FROM `users` WHERE 1
                                    $sql = "SELECT * FROM users";
                                    $result = mysqli_query($conn, $sql); 
                                    // Return the number of rows in result set
                                    $rowcount = mysqli_num_rows( $result );
                                    //	Display result
                                    printf("%d\n", $rowcount);
                                    ?>
                                </h2>

                                <div class="m-b-5">TOTAL USERS</div><i class="ti-user widget-stat-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Latest Orders</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                             <th width="91px">Date</th>
                                            <th>Transaction ID</th>
                                            <th>Customer</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    //`order_id`, `trans_no`, `trans_date`, `amount`, `user_id`, `txn_status`, `clnt_txn_ref`, `shipping_name`, `shipping_street`, `shipping_city`, `shipping_state_country`, `shipping_pin_code`, `shipping_mobile`, `shipping_email` SELECT * FROM `customer_order` WHERE 1
                                    $invoice_sql="SELECT * FROM customer_order where txn_status='PAID' order by order_id desc";
                                    $invoice_query=mysqli_query($conn,$invoice_sql);
                                    while($order_details=mysqli_fetch_array($invoice_query)) 
                                    { 
                                        //`user_id`, `name`, `street`, `city`, `country`, `postcode`, `mobile_no`, `user_name`, `password`SELECT * FROM `users` WHERE 1
                                        $x=$order_details['user_id'];
                                        $q1="SELECT * FROM users where user_id=$x";
                                        $query1=mysqli_query($conn,$q1);
                                        $name="";
                                            $mobile_no="";
                                            $email_id="";
                                        if($user_details=mysqli_fetch_array($query1)) 
                                           {
                                            $name=$user_details['name'];
                                            $mobile_no=$user_details['mobile_no'];
                                            $email_id=$user_details['user_name'];
                                           }
                                    ?>


                                        <tr>
                                        <td><?php echo $order_details['trans_date'];?></td>
                                            <td>
                                                <a href="invoice.php?order_id=<?php echo $order_details['order_id'];?>"><?php echo $order_details['trans_no'];?></a>
                                            </td>
                                            <td><?php echo $name;?></td>
                                            <td><?php echo $mobile_no;?></td>
                                            <td><?php echo $email_id;?></td>
                                            <td><a href="invoice.php?order_id=<?php echo $order_details['order_id'];?>"><?php echo number_format($order_details['amount'],2);?></a></td>
                                            <td>
                                                <span class="badge badge-success"><?php echo $order_details['txn_status'];?></span>
                                            </td>
                                            
                                        </tr>

                                    <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <style>
                    .visitors-table tbody tr td:last-child {
                        display: flex;
                        align-items: center;
                    }

                    .visitors-table .progress {
                        flex: 1;
                    }

                    .visitors-table .progress-parcent {
                        text-align: right;
                        margin-left: 10px;
                    }
                </style>
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