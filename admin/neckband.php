<?php
include_once("../include/conn.php");

if(isset($_POST['delete']))	
{
       $id=$_POST['id'];
       
      $qury=mysqli_query($conn,"DELETE FROM utensils WHERE id='$id'");
      header("location:utensils.php?err=Successfully deleted");
        
}

if(isset($_POST['submit']))
{
            //`id`, `name`, `size`, `weight`, `price`, `offer_price`, `discount`, `description`, `picture_1`, `picture_2`, 
        //`picture_3`, `picture_4`SELECT * FROM `product` WHERE 1
    $name= $_POST['name'] ;
    $size= $_POST['size'] ;
    $weight= $_POST['weight'] ;
    $price= $_POST['price'] ;
    $offer_price= $_POST['offer_price'] ;
    $discount= $_POST['discount'] ;
    $description= $_POST['description'] ;


    if(isset($_FILES['picture_1'])){
        $errors= array();
        $picture_1=$_FILES['picture_1']['name'];
        $picture_1_temp=$_FILES['picture_1']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($picture_1_temp,"../images/all_product/".$picture_1);
        }
    }
    if(isset($_FILES['picture_2'])){
        $errors= array();
        $picture_2=$_FILES['picture_2']['name'];
        $picture_2_temp=$_FILES['picture_2']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($picture_2_temp,"../images/all_product/".$picture_2);
        }
    }
    if(isset($_FILES['picture_3'])){
        $errors= array();
        $picture_3=$_FILES['picture_3']['name'];
        $picture_3_temp=$_FILES['picture_3']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($picture_3_temp,"../images/all_product/".$picture_3);
        }
    }
    if(isset($_FILES['picture_4'])){
        $errors= array();
        $picture_4=$_FILES['picture_4']['name'];
        $picture_4_temp=$_FILES['picture_4']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($picture_4_temp,"../images/all_product/".$picture_4);
        }
    }


    $sql="INSERT INTO utensils (name, size, weight, price, offer_price, discount, description, picture_1, picture_2, picture_3, picture_4)
    VALUES ('$name', '$size', '$weight', '$price', '$offer_price', '$discount', '$description', '$picture_1', '$picture_2', '$picture_3', '$picture_4')";
    $query=mysqli_query($conn,$sql);
    if($query){
    
        header("Location:utensils.php?msg=New record submit successfully");
    
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }

}

if(isset($_POST['update']))
{
            //`id`, `name`, `size`, `weight`, `price`, `offer_price`, `discount`, `description`, `picture_1`, `picture_2`, 
        //`picture_3`, `picture_4`SELECT * FROM `product` WHERE 1                                                                    
    
        $id=trim($_POST['id']);
        $name= $_POST['name'] ;
        $size= $_POST['size'] ;
        $weight= $_POST['weight'] ;
        $price= $_POST['price'] ;
        $offer_price= $_POST['offer_price'] ;
        $discount= $_POST['discount'] ;
        $description= $_POST['description'] ;

        $update=mysqli_query($conn,"update  utensils  set name='$name', size='$size', weight='$weight', price='$price', offer_price='$offer_price', discount='$discount', description='$description' where id='$id'");

        if(!empty($_FILES['picture_1']['name'])){
            $errors= array();
            $picture_1=$_FILES['picture_1']['name'];
            $picture_1_temp=$_FILES['picture_1']['tmp_name'];
            if(empty($errors)==true){
                move_uploaded_file($picture_1_temp,"../images/all_product/".$picture_1);
                $update1=mysqli_query($conn,"update  utensils  set picture_1='$picture_1' where id='$id'");
            }
        }

        if(!empty($_FILES['picture_2']['name'])){
            $errors= array();
            $picture_2=$_FILES['picture_2']['name'];
            $picture_2_temp=$_FILES['picture_2']['tmp_name'];
            if(empty($errors)==true){
                move_uploaded_file($picture_2_temp,"../images/all_product/".$picture_2);
                $update1=mysqli_query($conn,"update  utensils  set picture_2='$picture_2' where id='$id'");

            }
        }

        if(!empty($_FILES['picture_3']['name'])){
            $errors= array();
            $picture_3=$_FILES['picture_3']['name'];
            $picture_3_temp=$_FILES['picture_3']['tmp_name'];
            if(empty($errors)==true){
                move_uploaded_file($picture_3_temp,"../images/all_product/".$picture_3);
                $update1=mysqli_query($conn,"update  utensils  set picture_3='$picture_3' where id='$id'");

            }
        }

        if(!empty($_FILES['picture_4']['name'])){
            $errors= array();
            $picture_4=$_FILES['picture_4']['name'];
            $picture_4_temp=$_FILES['picture_4']['tmp_name'];
            if(empty($errors)==true){
                move_uploaded_file($picture_4_temp,"../images/all_product/".$picture_4);
                $update1=mysqli_query($conn,"update  utensils  set picture_4='$picture_4' where id='$id'");

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
        header("location:utensils.php?err=".$err);



}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Neckband</title>
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
    <script language="javascript">

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
           $id=$_REQUEST['id'];
        //`id`, `name`, `size`, `weight`, `price`, `offer_price`, `discount`, `description`, `picture_1`, `picture_2`, 
        //`picture_3`, `picture_4`SELECT * FROM `utensils` WHERE 1
		   $qre=mysqli_query($conn,"SELECT * FROM utensils where id=$id");
		   if($fetch=mysqli_fetch_array($qre))
			{
			  $id=$fetch['id'];
			  $name=$fetch['name'];
              $size=$fetch['size'];
              $weight=$fetch['weight'];
              $price=$fetch['price'];
              $offer_price=$fetch['offer_price'];
              $discount=$fetch['discount'];
              $description=$fetch['description'];
              $picture_1=$fetch['picture_1'];
              $picture_2=$fetch['picture_2'];
              $picture_3=$fetch['picture_3'];
              $picture_4=$fetch['picture_4'];

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
                   <h4 style="text-transform: uppercase;">Utensils Product</h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== Start Party Details===============================-->





            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Upload Utensils Products</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                            <p class="text-danger">Must be image upload 1000px x 1000px 72 Resolution</p>
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
                                            <input type="hidden" id="id" name="id"  readonly="readonly" value="<?php if(isset($_REQUEST['xedit'])) {echo $id;}?>" />    

                                            <div class="row">
                                                <div class="col-sm-3 form-group">
                                                    <label>Product Name <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="name" value="<?php if(isset($_REQUEST['xedit'])) {echo $name;}?>" placeholder="Enter product name">
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label>Size <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="size" value="<?php if(isset($_REQUEST['xedit'])) {echo $size;}?>" placeholder="Enter product name">
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label>Weight <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="weight" value="<?php if(isset($_REQUEST['xedit'])) {echo $weight;}?>" placeholder="Enter product name">
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label>Price <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="price" value="<?php if(isset($_REQUEST['xedit'])) {echo $price;}?>" placeholder="Enter product name">
                                                </div>  
                                                <div class="col-sm-3 form-group">
                                                    <label>Offer Price <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="offer_price" value="<?php if(isset($_REQUEST['xedit'])) {echo $offer_price;}?>" placeholder="Enter product name">
                                                </div> 
                                                <div class="col-sm-3 form-group">
                                                    <label>Discount  <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="discount" value="<?php if(isset($_REQUEST['xedit'])) {echo $discount;}?>" placeholder="Enter product name">
                                                </div>   
                                                <div class="col-sm-3 form-group">
                                                    <label>Description <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="description" value="<?php if(isset($_REQUEST['xedit'])) {echo $description;}?>" placeholder="Enter product name">
                                                </div>  

                                                <div class="col-sm-3 form-group">
                                                    <label>Product Images 1 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="picture_1" placeholder="">
                                                    <?php if(isset($_REQUEST['xedit'])) {?> <img src="../images/all_product/<?php echo $picture_1;?>" width="100px;"/> <?php } ?>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Product Images 2 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="picture_2" placeholder="">
                                                    <?php if(isset($_REQUEST['xedit'])) {?> <img src="../images/all_product/<?php echo $picture_2;?>" width="100px;"/> <?php } ?>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Product Images 3 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="picture_3" placeholder="">
                                                    <?php if(isset($_REQUEST['xedit'])) {?> <img src="../images/all_product/<?php echo $picture_3;?>" width="100px;"/> <?php } ?>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label>Product Images 4 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="file" name="picture_4" placeholder="">
                                                    <?php if(isset($_REQUEST['xedit'])) {?> <img src="../images/all_product/<?php echo $picture_4;?>" width="100px;"/> <?php } ?>
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
                                <div class="ibox-title">Utensils Product Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="">Name</th>
                                            <th class="">Size</th>
                                            <th class="">Weight</th>
                                            <th class="">Price</th>
                                            <th class="">Offer Price</th>
                                            <th class="">Discount</th>
                                            <th class="">Description</th>
                                            <th width="60px" class="">Pic-1</th>
                                            <th width="60px" class="">Pic-2</th>
                                            <th width="60px" class="">Pic-3</th>
                                            <th width="60px" class="">Pic-4</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    //`id`, `name`, `size`, `weight`, `price`, `offer_price`, `discount`, `description`, `picture_1`, `picture_2`, 
                                    //`picture_3`, `picture_4`SELECT * FROM `product` WHERE 1
                                        $sql1="SELECT * FROM utensils WHERE 1";
                                        $query1=mysqli_query($conn,$sql1);
                                        while($prd=mysqli_fetch_array($query1)) 
                                        {?>
                                            <tr>
                                                
                                               
                                                <td><b><?php echo $prd['name'];?></b></td>
                                                <td><b><?php echo $prd['size'];?></b></td>
                                                <td><b><?php echo $prd['weight'];?></b></td>
                                                <td><b><?php echo $prd['price'];?></b></td>
                                                <td><b><?php echo $prd['offer_price'];?></b></td>
                                                <td><b><?php echo $prd['discount'];?></b></td>
                                                <td><b><?php echo $prd['description'];?></b></td>
                                                <td><b><img src="../images/all_product/<?php echo $prd['picture_1'];?>" alt="" srcset=""> </b></td>
                                                <td><b><img src="../images/all_product/<?php echo $prd['picture_2'];?>" alt="" srcset=""> </b></td>
                                                <td><b><img src="../images/all_product/<?php echo $prd['picture_3'];?>" alt="" srcset=""> </b></td>
                                                <td><b><img src="../images/all_product/<?php echo $prd['picture_4'];?>" alt="" srcset=""> </b></td>


                                                <!--========= Impotant sweet alert js =================-->

                                                
                                                <form method="post" action="" enctype="multipart/form-data" onsubmit="return myFunction();">          
                                                    <input type="hidden" name="id" value="<?php echo $prd['id'];?>" />

                                                <td class="d-flex"><a href="utensils.php?xedit=1&id=<?php echo $prd['id'];?>"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:25px;"></i></a><button  style="border:none; color:#007bff" type="submit" name="delete"><i class="fa fa-trash" aria-hidden="true" style="font-size:25px;"></i></a></button></td>
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