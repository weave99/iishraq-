<?php
include_once("../include/conn.php");

if(isset($_POST['delete']))	
{
       $prod_id=$_POST['prod_id'];
       
      $qury=mysqli_query($conn,"DELETE FROM `product_details` WHERE prod_id='$prod_id'");
      header("location:product_details.php?err=Successfully deleted");
        
}

if(isset($_POST['submit']))
{
    //`prod_id`, `category_id`, `prod_name`, `mrp`, `persent_discount`, `offer_price`, `replacement_txt`, `warranty_txt`, 
    //`color_1`, `color_2`, `color_3`, `picture_1`, `picture_2`, `picture_3`SELECT * FROM `product_details` WHERE 1


    // Insert Product details
    $category_id= $_POST['category_id'] ;
    $prod_name= $_POST['prod_name'] ;
    $mrp= $_POST['mrp'] ;
    $persent_discount= $_POST['persent_discount'] ;
    $offer_price= $_POST['offer_price'] ;
    $replacement_txt= $_POST['replacement_txt'] ;
    $warranty_txt= $_POST['warranty_txt'] ;
    $color_1= $_POST['color_1'] ;
    $color_2= $_POST['color_2'] ;
    $color_3= $_POST['color_3'] ;
    $picture_1= $_POST['picture_1'] ;
    $picture_2= $_POST['picture_2'] ;
    $picture_3= $_POST['picture_3'] ;
    $feature_1= $_POST['feature_1'] ;
    $feature_2= $_POST['feature_2'] ;
    $feature_3= $_POST['feature_3'] ;
    $feature_4= $_POST['feature_4'] ;
    $feature_5= $_POST['feature_5'] ;
    $feature_6= $_POST['feature_6'] ;
    


    if(isset($_FILES['picture_1'])){
        $errors= array();
        $picture_1=$_FILES['picture_1']['name'];
        $picture_1_temp=$_FILES['picture_1']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($picture_1_temp,"../images/products/".$picture_1);
        }
    }
    if(isset($_FILES['picture_2'])){
        $errors= array();
        $picture_2=$_FILES['picture_2']['name'];
        $picture_2_temp=$_FILES['picture_2']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($picture_2_temp,"../images/products/".$picture_2);
        }
    }
    if(isset($_FILES['picture_3'])){
        $errors= array();
        $picture_3=$_FILES['picture_3']['name'];
        $picture_3_temp=$_FILES['picture_3']['tmp_name'];
        if(empty($errors)==true){
            move_uploaded_file($picture_3_temp,"../images/products/".$picture_3);
        }
    }


    $sql="INSERT INTO product_details (category_id, prod_name, mrp, persent_discount, offer_price, replacement_txt, warranty_txt, color_1, color_2, color_3, picture_1, picture_2, picture_3, feature_1, feature_2, feature_3, feature_4, feature_5, feature_6)
    VALUES ('$category_id', '$prod_name', '$mrp', '$persent_discount', '$offer_price', '$replacement_txt', '$warranty_txt', '$color_1', '$color_2', '$color_3', '$picture_1', '$picture_2', '$picture_3', '$feature_1', '$feature_2', '$feature_3', '$feature_4', '$feature_5', '$feature_6')";
    
    
    
    $query=mysqli_query($conn,$sql);
    if($query){
    
        header("Location:product_details.php?msg=New record submit successfully");
    
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }

}






if(isset($_POST['update']))
{
    //`prod_id`, `category_id`, `prod_name`, `mrp`, `persent_discount`, `offer_price`, `replacement_txt`, `warranty_txt`, 
    //`color_1`, `color_2`, `color_3`, `picture_1`, `picture_2`, `picture_3`SELECT * FROM `product_details` WHERE 1
                                       
        $prod_id=trim($_POST['prod_id']);
        $category_id= $_POST['category_id'] ;
        $prod_name= $_POST['prod_name'] ;
        $mrp= $_POST['mrp'] ;
        $persent_discount= $_POST['persent_discount'] ;
        $offer_price= $_POST['offer_price'] ;
        $replacement_txt= $_POST['replacement_txt'] ;
        $warranty_txt= $_POST['warranty_txt'] ;
        $color_1= $_POST['color_1'] ;
        $color_2= $_POST['color_2'] ;
        $color_3= $_POST['color_3'] ;
        $feature_1= $_POST['feature_1'] ;
        $feature_2= $_POST['feature_2'] ;
        $feature_3= $_POST['feature_3'] ;
        $feature_4= $_POST['feature_4'] ;
        $feature_5= $_POST['feature_5'] ;
        $feature_6= $_POST['feature_6'] ;

        $update=mysqli_query($conn,"update  product_details  set category_id='$category_id', prod_name='$prod_name', mrp='$mrp', persent_discount='$persent_discount', offer_price='$offer_price', replacement_txt='$replacement_txt', warranty_txt='$warranty_txt', color_1='$color_1', color_2='$color_2', color_3='$color_3', feature_1='$feature_1', feature_2='$feature_2', feature_3='$feature_3', feature_4='$feature_4', feature_5='$feature_5', feature_6='$feature_6' where prod_id='$prod_id'");

        if(!empty($_FILES['picture_1']['name'])){
            $errors= array();
            $picture_1=$_FILES['picture_1']['name'];
            $picture_1_temp=$_FILES['picture_1']['tmp_name'];
            if(empty($errors)==true){
                move_uploaded_file($picture_1_temp,"../images/products/".$picture_1);
                $update1=mysqli_query($conn,"update  product_details  set picture_1='$picture_1' where prod_id='$prod_id'");
            }
        }
        if(!empty($_FILES['picture_2']['name'])){
            $errors= array();
            $picture_2=$_FILES['picture_2']['name'];
            $picture_2_temp=$_FILES['picture_2']['tmp_name'];
            if(empty($errors)==true){
                move_uploaded_file($picture_2_temp,"../images/products/".$picture_2);
                $update1=mysqli_query($conn,"update  product_details  set picture_2='$picture_2' where prod_id='$prod_id'");
            }
        }
        


        if(!empty($_FILES['picture_3']['name'])){
            $errors= array();
            $picture_3=$_FILES['picture_3']['name'];
            $picture_3_temp=$_FILES['picture_3']['tmp_name'];
            if(empty($errors)==true){
                move_uploaded_file($picture_3_temp,"../images/products/".$picture_3);
                $update1=mysqli_query($conn,"update  product_details  set picture_3='$picture_3' where prod_id='$prod_id'");
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
        header("location:product_details.php?err=".$err);



}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Product Details</title>
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
           $prod_id=$_REQUEST['prod_id'];
          // `book_id`, `category_id`, `prod_name`, `mrp`, `price`, `offer_price`, `preplacement_txt`, `warranty_txt`, `color_1`
          // , `color_2`, `color_3`, `picture_1`, `picture_2`, `picture_3`, `picture_1` SELECT * FROM `product_details` WHERE 1
             
		   $qre=mysqli_query($conn,"SELECT * FROM product_details where prod_id=$prod_id");
		   if($fetch=mysqli_fetch_array($qre))
			{
			  $prod_id=$fetch['prod_id'];
			  $category_id=$fetch['category_id'];
              $prod_name=$fetch['prod_name'];
              $mrp=$fetch['mrp'];
              $persent_discount=$fetch['persent_discount'];
              $offer_price=$fetch['offer_price'];
              $replacement_txt=$fetch['replacement_txt'];
              $warranty_txt=$fetch['warranty_txt'];
              $color_1=$fetch['color_1'];
              $color_2=$fetch['color_2'];
              $color_3=$fetch['color_3'];
              $picture_1=$fetch['picture_1'];
              $picture_2=$fetch['picture_2'];
              $picture_3=$fetch['picture_3'];
              $feature_1=$fetch['feature_1'];
              $feature_2=$fetch['feature_2'];
              $feature_3=$fetch['feature_3'];
              $feature_4=$fetch['feature_4'];
              $feature_5=$fetch['feature_5'];
              $feature_6=$fetch['feature_6'];
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
                   <h4 style="text-transform: uppercase;">Product Details</h4>
                </div>
            </div>
<!--=========== End Indigator Bar===============================-->









<!--=========== Start Party Details===============================-->





            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Upload product details</div>
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
                                            <input type="hidden" id="prod_id" name="prod_id"  readonly="readonly" value="<?php if(isset($_REQUEST['xedit'])) {echo $prod_id;}?>" />    
                                            <!-- `prod_id`, `category_id`, `prod_name`, `mrp`, `persent_discount`, `offer_price`, `replacement_txt`, `warranty_txt`, `color_1`, `color_2`, `color_3`, `picture_1`, `picture_2`, `picture_3`SELECT * FROM `product_details` WHERE 1-->
                                              
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label>Select Category<span class="text-danger">*</span></label>
                                                    <select class="form-control" name="category_id" id="category_id">
                                                        <option selected>Open this category menu</option>
                                                    <?php
                                                    $sql_ctgy="SELECT * FROM `product_category` WHERE 1";
                                                    $query_ctgy=mysqli_query($conn,$sql_ctgy);
                                                    while($ctgy=mysqli_fetch_array($query_ctgy)) 
                                                    {?>
                                                        <option value="<?php echo $ctgy['category_id'];?>" <?php if(isset($_REQUEST['xedit'])) if($ctgy['category_id']==$category_id) echo 'selected';?>><?php echo $ctgy['category_name'];?></option>
                                                    <?php
                                                    }
                                                    ?>  
                                                    </select>
                                                </div>   
                                            </div>

                                      

                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label>Product Name <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="prod_name" value="<?php if(isset($_REQUEST['xedit'])) {echo $prod_name;}?>" placeholder="Enter product name">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>MRP <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="mrp" value="<?php if(isset($_REQUEST['xedit'])) {echo $mrp;}?>" placeholder="Enter MRP">
                                                </div>  

                                                <div class="col-sm-4 form-group">
                                                    <label>Persent Discount<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="persent_discount" value="<?php if(isset($_REQUEST['xedit'])) {echo $persent_discount;}?>" placeholder="Enter %">
                                                </div>  

                                                <div class="col-sm-4 form-group">
                                                    <label>Offer Price <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="offer_price" value="<?php if(isset($_REQUEST['xedit'])) {echo $offer_price;}?>" placeholder="Enter offer price">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Replacement <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="replacement_txt" value="<?php if(isset($_REQUEST['xedit'])) {echo $replacement_txt;}?>" placeholder="Enter replacement text">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Warranty <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="warranty_txt" value="<?php if(isset($_REQUEST['xedit'])) {echo $warranty_txt;}?>" placeholder="Enter warranty text">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>color 1 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="color_1" value="<?php if(isset($_REQUEST['xedit'])) {echo $color_1;}?>" placeholder="Enter color 1">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>color 2 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="color_2" value="<?php if(isset($_REQUEST['xedit'])) {echo $color_2;}?>" placeholder="Enter color 2">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>color 3 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="color_3" value="<?php if(isset($_REQUEST['xedit'])) {echo $color_3;}?>" placeholder="Enter color 3">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Picture 1 <span class="text-danger">*</span></label>
                                                    <?php if(isset($_REQUEST['xedit'])) {?> <img src="../images/products/<?php echo $picture_1;?>" width="100px;"/> <?php } ?>
                                                    <input class="form-control" type="file" name="picture_1" value="<?php if(isset($_REQUEST['xedit'])) {echo $picture_1;}?>" placeholder="Enter">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Picture 2 <span class="text-danger">*</span></label>
                                                    <?php if(isset($_REQUEST['xedit'])) {?> <img src="../images/products/<?php echo $picture_2;?>" width="100px;"/> <?php } ?>
                                                    <input class="form-control" type="file" name="picture_2" value="<?php if(isset($_REQUEST['xedit'])) {echo $picture_2;}?>" placeholder="Enter">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <label>Picture 3 <span class="text-danger">*</span></label>
                                                    <?php if(isset($_REQUEST['xedit'])) {?> <img src="../images/products/<?php echo $picture_3;?>" width="100px;"/> <?php } ?>
                                                    <input class="form-control" type="file" name="picture_3" value="<?php if(isset($_REQUEST['xedit'])) {echo $picture_3;}?>" placeholder="Enter">
                                                </div>  
 


                                                <div class="col-sm-6 form-group">
                                                    <label>Feature 1 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="feature_1" value="<?php if(isset($_REQUEST['xedit'])) {echo $feature_1;}?>" placeholder="Enter feature 1">
                                                </div>  
                                                <div class="col-sm-6 form-group">
                                                    <label>Feature 2 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="feature_2" value="<?php if(isset($_REQUEST['xedit'])) {echo $feature_2;}?>" placeholder="Enter feature 2">
                                                </div>  
                                                <div class="col-sm-6 form-group">
                                                    <label>Feature 3 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="feature_3" value="<?php if(isset($_REQUEST['xedit'])) {echo $feature_3;}?>" placeholder="Enter feature 3">
                                                </div>  
                                                <div class="col-sm-6 form-group">
                                                    <label>Feature 4 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="feature_4" value="<?php if(isset($_REQUEST['xedit'])) {echo $feature_4;}?>" placeholder="Enter feature 4">
                                                </div>  
                                                <div class="col-sm-6 form-group">
                                                    <label>Feature 5 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="feature_5" value="<?php if(isset($_REQUEST['xedit'])) {echo $feature_5;}?>" placeholder="Enter feature 5">
                                                </div>  
                                                <div class="col-sm-6 form-group">
                                                    <label>Feature 6 <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="feature_6" value="<?php if(isset($_REQUEST['xedit'])) {echo $feature_6;}?>" placeholder="Enter feature 6">
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
                                            <th class="">Cate'gory Name</th>
                                            <th class="">Product Name</th>
                                            
                                            <th class="">MRP</th>
                                            <th class="">Persent Discount</th>
                                            <th class="">Offer Price</th>
                                            <th class="">Replacement </th>
                                            <th class="">Warranty</th>
                                            <th class="">C 1</th>
                                            <th class="">C 2</th>
                                            <th class="">C 3</th>
                                            <th width="200px" class="">Img 1</th>
                                            <th width="200px" class="">Img 2</th>
                                            <th width="200px" class="">Img 3</th>
                                            <th class="">Feature 1</th>
                                            <th class="">Feature 2</th>
                                            <th class="">Feature 3</th>
                                            <th class="">Feature 4</th>
                                            <th class="">Feature 5</th>
                                            <th class="">Feature 6</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    // `book_id`, `category_id`, `prod_name`, `mrp`, `price`, `offer_price`, `preplacement_txt`, `warranty_txt`, `color_1`
                                    // , `color_2`, `color_3`, `picture_1`, `picture_2`, `picture_3`, `picture_1` SELECT * FROM `product_details` WHERE 1
                                        
                                        $sql1="SELECT * FROM product_details WHERE 1";
                                        $query1=mysqli_query($conn,$sql1);
                                        while($prd=mysqli_fetch_array($query1)) 
                                        {
                                            $category_id=$prd['category_id'];
                                        ?>
                                            <tr>
                                                
                                                <?php  
                                                $category_name="";
                                                $query=mysqli_query($conn,"select category_name from product_category where category_id=$category_id");
                                                if($f1=mysqli_fetch_array($query)) 
                                                    $category_name=$f1['category_name'];
                                                ?>
    
                                                <td><?php echo $category_name;?></td>
                                                <td><?php echo $prd['prod_name'];?></td>
                                                <td><?php echo $prd['mrp'];?></b></td>
                                                <td><?php echo $prd['persent_discount'];?></td>
                                                <td><?php echo $prd['offer_price'];?></td>
                                                <td><?php echo $prd['replacement_txt'];?></td>
                                                <td><?php echo $prd['warranty_txt'];?></td>
                                                <td><?php echo $prd['color_1'];?></td>
                                                <td><?php echo $prd['color_2'];?></td>
                                                <td><?php echo $prd['color_3'];?></td>
                                                <td>
                                                    <a href="../images/products/<?php echo $prd['picture_1'];?>" target="_blank">
                                                        <img src="../images/products/<?php echo $prd['picture_1'];?>" alt="" srcset="">
                                                    </a>    
                                                </td>
                                                <td>
                                                    <a href="../images/products/<?php echo $prd['picture_2'];?>" target="_blank">
                                                        <img src="../images/products/<?php echo $prd['picture_2'];?>" alt="" srcset="">
                                                    </a>    
                                                </td>
                                                <td>
                                                    <a href="../images/products/<?php echo $prd['picture_3'];?>" target="_blank">
                                                        <img src="../images/products/<?php echo $prd['picture_3'];?>" alt="" srcset="">
                                                    </a>    
                                                </td>
                                                
                                                <td><?php echo $prd['feature_1'];?></td>
                                                <td><?php echo $prd['feature_2'];?></td>
                                                <td><?php echo $prd['feature_3'];?></td>
                                                <td><?php echo $prd['feature_4'];?></td>
                                                <td><?php echo $prd['feature_5'];?></td>
                                                <td><?php echo $prd['feature_6'];?></td>
                                                
                                        


                                                <!--========= Impotant sweet alert js =================-->

                                                
                                                <form method="post" action="" enctype="multipart/form-data" onsubmit="return myFunction();">          
                                                    <input type="hidden" name="prod_id" value="<?php echo $prd['prod_id'];?>" />

                                                <td class="d-flex"><a href="product_details.php?xedit=1&prod_id=<?php echo $prd['prod_id'];?>"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:25px;"></i></a><button  style="border:none; color:#007bff" type="submit" name="delete"><i class="fa fa-trash" aria-hidden="true" style="font-size:25px;"></i></a></button></td>
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