<?php
include_once("../include/conn.php");

if(isset($_POST['delete']))	
{
       $store_id=$_POST['store_id'];
       
      $qury=mysqli_query($conn,"DELETE FROM `product_details` WHERE store_id='$store_id'");
      header("location:store_details.php?err=Successfully deleted");
        
}

if(isset($_POST['submit']))
{
    //`store_id`, `store_name`, `store_address`, `mob_no`, `opening_time`, 
    //`store_picture`, `state`, `city`, `locality`SELECT * FROM `store_details` WHERE 1


    
    // Insert store details
    $store_name= $_POST['store_name'] ;
    $store_address= $_POST['address'] ;
    $mob_no= $_POST['mob_no'] ;
    $opening_time= $_POST['opening_time'] ;
    $state= $_POST['state'] ;
    $city= $_POST['city'] ;
    $locality= $_POST['locality'] ;
    


    if(isset($_FILES['store_picture'])){
        $errors= array();
        $store_picture=$_FILES['store_picture']['name'];
        $store_picture_temp=$_FILES['store_picture']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($store_picture_temp,"../images/stores/".$store_picture);
        }
    }

    $sql="INSERT INTO store_details (`store_name`, `store_address`, `mob_no`, `opening_time`, `store_picture`, `state`, `city`, `locality`)
    VALUES ('$store_name', '$store_address', '$mob_no', '$opening_time','$store_picture', '$state', '$city', '$locality')";
    
    
    
    $query=mysqli_query($conn,$sql);
    if($query){
    
        header("Location:store_details.php?msg=New record submit successfully");
    
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }

}






if(isset($_POST['update']))
{
    //`store_id`, `store_name`, `store_address`, `store_picture`, `state`, `city`, `locality`SELECT * FROM 
    //`store_details` WHERE 1

                           
        $store_id =trim($_POST['store_id']);
        $store_name= $_POST['store_name'] ;
        $store_address= $_POST['address'] ;
        $mob_no= $_POST['mob_no'] ;
        $opening_time= $_POST['opening_time'] ;
        $state= $_POST['state'] ;
        $city= $_POST['city'] ;
        $locality= $_POST['locality'] ;

        $update=mysqli_query($conn,"update  store_details  set store_id ='$store_id', store_name='$store_name', store_address='$store_address', mob_no='$mob_no', opening_time='$opening_time', state='$state', city='$city', locality='$locality' where store_id='$store_id'");

        if(!empty($_FILES['store_picture']['name'])){
            $errors= array();
            $store_picture=$_FILES['store_picture']['name'];
            $store_picture_temp=$_FILES['store_picture']['tmp_name'];
            if(empty($errors)==true){
                move_uploaded_file($store_picture_temp,"../images/stores/".$store_picture);
                $update1=mysqli_query($conn,"update  store_details  set store_picture='$store_picture' where store_id ='$store_id'");
            }
        }

            

    if($update)
    {
        $err="Successfully updated";
    }
    else
    {
        $err=mysql_error();
    }
        header("location:store_details.php?msg=Update successfully");
            



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
                   <h4 style="text-transform: uppercase;">Store Details</h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== Start Party Details===============================-->





            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Upload store details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                            
                            <?php
                                    if (isset($_GET["msg"])) {
                                    $msg = $_GET["msg"];
                                    
                                    echo'
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>'. $msg . '</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>';
                                    }
                                    ?>
                                        <form action="" method="POST" enctype="multipart/form-data" >
                                            <input type="hidden" id="store_id" name="store_id"  readonly="readonly" value="<?php if(isset($_REQUEST['xedit'])) {echo $store_id;}?>" />    
                                            <!-- `prod_id`, `category_id`, `prod_name`, `mrp`, `persent_discount`, `offer_price`, `replacement_txt`, `warranty_txt`, `color_1`, `color_2`, `color_3`, `store_picture`, `picture_2`, `picture_3`SELECT * FROM `product_details` WHERE 1-->
                                              
                                      

                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label>Store Name <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="store_name" value="<?php if(isset($_REQUEST['xedit'])) {echo $store_name;}?>" placeholder="Enter store name">
                                                </div>  
                                                <div class="col-sm-6 form-group">
                                                    <label>Store Address <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="address" value="<?php if(isset($_REQUEST['xedit'])) {echo $address;}?>" placeholder="Enter address">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Contact No <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="mob_no" value="<?php if(isset($_REQUEST['xedit'])) {echo $mob_no;}?>" placeholder="Enter mobile number">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Opening time <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="opening_time" value="<?php if(isset($_REQUEST['xedit'])) {echo $opening_time;}?>" placeholder="Enter opening time">
                                                </div>  

                                                <div class="col-sm-4 form-group">
                                                    <label>Store Image <span class="text-danger">*</span></label>
                                                    <?php if(isset($_REQUEST['xedit'])) {?> <img src="../images/stores/<?php echo $store_picture;?>" width="100px;"/> <?php } ?>
                                                    <input class="form-control" type="file" name="store_picture" value="<?php if(isset($_REQUEST['xedit'])) {echo $store_picture;}?>" placeholder="Enter">
                                                </div>  



                                               <!-- 
                                                <div class="col-sm-4 form-group">
                                                    <label>State <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="state" value="<?php if(isset($_REQUEST['xedit'])) {echo $state;}?>" placeholder="Enter state">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>City<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="city" value="<?php if(isset($_REQUEST['xedit'])) {echo $city;}?>" placeholder="Enter city">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Locality <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="locality" value="<?php if(isset($_REQUEST['xedit'])) {echo $locality;}?>" placeholder="Enter locality ">
                                                </div>  
                                                -->

                                                <div class="col-sm-4 form-group">
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



                                                <div class="col-sm-4 form-group">
                                                <label>City<span class="text-danger">*</span></label>
                                                        <input list="browsers2"  class="form-control"   name="city" id="city" value="<?php if(isset($_REQUEST['xedit'])) {echo $city;}?>"   onKeyUp="convert_data_to_upper(this);"  placeholder="Select city" />
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


                                                <div class="col-sm-4 form-group">
                                                <label>Locality <span class="text-danger">*</span></label>
                                                    <input list="browsers3"  class="form-control"   name="locality" id="locality"  value="<?php if(isset($_REQUEST['xedit'])) {echo $locality;}?>"  onKeyUp="convert_data_to_upper(this);"  placeholder="Select locality" />
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


                                               
                                           

                                            </div>
                                            <div class="form-group">
                                            <?php if(isset($_REQUEST['xedit'])) { ?><button class="btn btn-success" type="submit" name="update" >Update</button><?php } else {?><button class="btn btn-success" type="submit" name="submit" >Submit</button><?php } ?>
                                            </div>
                                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Service Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th class="">Store Name</th>
                                            
                                            <th class="">Store Address</th>
                                            <th class="">Contact No.</th>
                                            <th class="">Opening Time</th>

                                            <th width="10%">Store Image</th>
                                            <th class="">State</th>
                                            <th class="">City </th>
                                            <th class="">Locatily</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    //`store_id`, `store_name`, `store_address`, `store_picture`, `state`, `city`, `locality`SELECT * FROM 
                                    //`store_details` WHERE 1

                                        $sql1="SELECT * FROM store_details WHERE 1";
                                        $query1=mysqli_query($conn,$sql1);
                                        while($prd=mysqli_fetch_array($query1)) 
                                        {
                                           
                                        ?>
                                            <tr>
                                                
    
                                              
                                                <td><?php echo $prd['store_name'];?></td>
                                                <td><?php echo $prd['store_address'];?></b></td>
                                                <td><?php echo $prd['mob_no'];?></b></td>
                                                <td><?php echo $prd['opening_time'];?></b></td>
                                                
                                                <td>
                                                    <a href="../images/stores/<?php echo $prd['store_picture'];?>" target="_blank">
                                                        <img src="../images/stores/<?php echo $prd['store_picture'];?>" alt="" srcset="">
                                                    </a>    
                                                </td>

                                                <td><?php echo $prd['state'];?></td>
                                                <td><?php echo $prd['city'];?></td>
                                                <td><?php echo $prd['locality'];?></td>


                                                <!--========= Impotant sweet alert js =================-->

                                                
                                                <form method="post" action="" enctype="multipart/form-data" onsubmit="return myFunction();">          
                                                    <input type="hidden" name="store_id" value="<?php echo $prd['store_id'];?>" />

                                                <td class="d-flex"><a href="store_details.php?xedit=1&store_id=<?php echo $prd['store_id'];?>"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:25px;"></i></a><button  style="border:none; color:#007bff" type="submit" name="delete"><i class="fa fa-trash" aria-hidden="true" style="font-size:25px;"></i></a></button></td>
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