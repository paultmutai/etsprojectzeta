<?php
include "config.php";
if(isset(
    $_POST['firstname'],
    $_POST['lastname'],
    $_POST['ward'],
    $_POST['schools'],
    $_POST['pnumber'],
    $_POST['email'],
    $_POST['password'],
    $_POST['confpassword']
))
{
  $firstname= trim ($_POST['firstname']);
  $lastname=trim ($_POST['lastname']);
  $ward=trim ($_POST['ward']);
  $schools=trim($_POST['schools']);
  $pnumber=trim ($_POST['pnumber']);
  $email=trim($_POST['email']);
  $password=trim($_POST['password']);
  $confpassword=trim($_POST['confpassword']);

    if(strlen($password)<6){
$password_error="ERROR";
}
    else{
        $store_password=password_hash($password, PASSWORD_DEFAULT);
    }
if($confpassword!=$password){
    $confpassword_pass_error="Passwords not same";
    echo "conf_pass_error";
    header("location:dSignup.php");
}
else{
    $store_confirm_pass=password_hash($confpassword, PASSWORD_DEFAULT);
}
}
if(empty($password_error)and empty($confpassword_pass_error)){
    $sql="INSERT INTO `drivers`( `firstname`, `lastname`, `ward`, `school`, `pnumber`, `email`, `password`)VALUES ('$firstname','$lastname','$ward','$schools','$pnumber','$email','$store_password')";

}
$result=mysqli_query($link, $sql);
if($result) {
   // echo "You have been registered successfully";
    header("location:dLogin.php");
}
else{
    echo "ERROR executing $sql". mysqli_error($link);
    header("location:error.php");

}