<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
if(isset($_POST["send"])){
  $mail = new PHPMailer(true);

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'soumo.contactsform@gmail.com';
  $mail->Password = 'tauaytfetwkyuhmn';
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;

  $mail->setFrom('soumo.contactsform@gmail.com','Website Enquiry Form');
  $mail->addAddress('soumodeepmondal20@gmail.com');
  $mail->addAddress('soumo.contactsform@gmail.com');
  $mail->isHTML(true);
  $mail->Subject = $_POST["subject"];
  $mail->Body = "<b>Name :</b> ".$_POST["name"]."<br>".
                "<b>Email :</b> ".$_POST["email"]."<br>".
                "<b>Contact Number :</b> ".$_POST["mob_no"]."<br>".
                "<b>Subject :</b> ".$_POST["subject"]."<br>".
                "<b>Message :</b> ".$_POST["message"];
  if($mail->send()){
    echo "<script>alert('Form submit sucessfully owner will be contact soon...')</script>";
    echo "<script>location.href='contact.php'</script>";
  }
  else{
    echo "<script>alert('Error please try again')</script>";
  }
}
?>








