<?php
include_once("../include/conn.php");


//`id`, `userid`, `password`SELECT * FROM `admin` WHERE 1

    $userid=trim($_POST['userid']);
    $password=trim($_POST['password']);

$sql1="SELECT * FROM admin WHERE userid='$userid' and password='$password'";
$query1=mysqli_query($conn,$sql1);
if($r=mysqli_fetch_array($query1))
{

            session_start();
            $_SESSION['userid']=$userid;
            header("location:dashboard.php");
           
  

}
    else{

        header("location:index.php?err='Invalide user'");
       }
?>