<?php
include_once("../include/conn.php");

if(isset($_POST['delete']))	
{
       $claim_id=$_POST['claim_id'];
       
      $qury=mysqli_query($conn,"DELETE FROM `claim_warranty` WHERE claim_id='$claim_id'");
      header("location:claim_warranty_details.php?err=Successfully deleted");
        
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Store Details</title>
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <!-- GLOBAL MAINLY STYLES-->
    <link href="dashboard-source/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="dashboard-source/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="dashboard-source/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="dashboard-source/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="dashboard-source/assets/css/main.min.css" rel="stylesheet" />
    <link href="dashboard-source/assets/css/dashboard.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <script color_2="javascript">

        function myFunction() {
            if (confirm("Are you sure to delete?") == true) {            
            return true;
            } else {
                return false;
                
            }
        }



        function convert_data_to_upper(x)
        {
      
	    x.value=x.value.toUpperCase();
        }
 
 
        function check_numeric(x)
        {
            var str="-0123456789.";
            i=0;
            number_of_decimal_point=0;
            while(i<x.value.length)
                {
                    //alert(x.value);
                    if(str.indexOf(x.value.charAt(i))==-1)
                        {
                        x.value=x.value.substring(0,i);
                        return false;
                        }
                    if(".".indexOf(x.value.charAt(i))!=-1)
                        {
                        number_of_decimal_point++;
                        if(number_of_decimal_point>1)
                            {
                            x.value=x.value.substring(0,i);
                            return false;
                            }
                        }
                    i++;
                }
         }

        function check_decimal(x)
        {
            var str="0123456789.";
            i=0;
            number_of_decimal_point=0;
            while(i<x.value.length)
                {
                    //alert(x.value);
                    if(str.indexOf(x.value.charAt(i))==-1)
                        {
                        x.value=x.value.substring(0,i);
                        return false;
                        }
                    if(".".indexOf(x.value.charAt(i))!=-1)
                        {
                        number_of_decimal_point++;
                        if(number_of_decimal_point>1)
                            {
                            x.value=x.value.substring(0,i);
                            return false;
                            }
                        }
                    i++;
                }
	 
        }
</script>
</head>

<body class="fixed-navbar">

<?php if(isset($_REQUEST['xedit']))
         {
           $store_id=$_REQUEST['store_id'];
    //`store_id`, `store_name`, `store_address`, `store_picture`, `state`, `city`, `locality`SELECT * FROM 
    //`store_details` WHERE 1

		   $qre=mysqli_query($conn,"SELECT * FROM store_details where store_id=$store_id");
		   if($fetch=mysqli_fetch_array($qre))
			{
			  $store_id=$fetch['store_id'];
			  $store_name=$fetch['store_name'];
              $address=$fetch['store_address'];
              $mob_no= $fetch['mob_no'] ;
              $opening_time= $fetch['opening_time'] ;
              $store_picture=$fetch['store_picture'];
              $state=$fetch['state'];
              $city=$fetch['city'];
              $locality=$fetch['locality'];


			}
		 
}
?>
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
                   <h4 style="text-transform: uppercase;">Claim Warranty Details</h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== Start Party Details===============================-->

<!--`claim_id`, `name`, `email`, `mob_no`, `address`, `local_retailer`, `invoice_no`, `invoice_picture`, `tocken_no`, `reg_date`SELECT * FROM `claim_warranty` WHERE 1-->

            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Claim Warranty Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th class="">Claim Id</th>
                                            <th class="">Name</th>
                                            <th class="">Email</th>
                                            <th class="">Mobile No.</th>
                                            <th width="60px">Address</th>
                                            <th class="">Retailer</th>
                                            <th class="">Invoice No. </th>
                                            <th width="50px">Invoice Picture </th>
                                            <th class="">Tocken No.</th>
                                            <th class="">Reg. Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
//`claim_id`, `name`, `email`, `mob_no`, `address`, `local_retailer`, `invoice_no`, `invoice_picture`, `tocken_no`, `reg_date`SELECT *
// FROM `claim_warranty` WHERE 1-->

                                        $sql1="SELECT * FROM claim_warranty ORDER BY claim_id DESC";
                                        $query1=mysqli_query($conn,$sql1);
                                        while($prd=mysqli_fetch_array($query1)) 
                                        {
                                           
                                        ?>
                                            <tr>
                                                
    
                                                <td><?php echo $prd['claim_id'];?></td>
                                                <td><?php echo $prd['name'];?></td>
                                                <td><?php echo $prd['email'];?></b></td>
                                                <td><?php echo $prd['mob_no'];?></b></td>
                                                <td><?php echo $prd['address'];?></b></td>
                                                <td><?php echo $prd['local_retailer'];?></td>
                                                <td><?php echo $prd['invoice_no'];?></td>
                                                <td>
                                                    <a href="../images/claim_warranty/<?php echo $prd['invoice_picture'];?>" target="_blank">
                                                    <img src="../images/claim_warranty/<?php echo $prd['invoice_picture'];?>" alt="">
                                                    </a>    
                                                </td>

                                                <td><?php echo $prd['tocken_no'];?></td>
                                                <td><?php echo $prd['reg_date'];?></td>
                                                



                                                <!--========= Impotant sweet alert js =================-->

                                                
                                                <form method="post" action="" enctype="multipart/form-data" onsubmit="return myFunction();">          
                                                    <input type="hidden" name="claim_id" value="<?php echo $prd['claim_id'];?>" />

                                                <td class="d-flex">
                                                    <!--<a href="store_details.php?xedit=1&claim_id=<?php echo $prd['claim_id'];?>"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:25px;"></i></a>-->
                                                <button  style="border:none; color:#007bff" type="submit" name="delete"><i class="fa fa-trash" aria-hidden="true" style="font-size:25px;"></i></a></button></td>
                                              </form>

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
                    .table td, .table th {
                        padding: 0.30rem;
                    }

                </style>

            </div>
<!--=========== End Party Details===============================-->








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