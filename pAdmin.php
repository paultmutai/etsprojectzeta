<?php
session_start();
if(!isset($_SESSION["loggedin"])or $_SESSION["loggedin"]!==true){
    header("location:error.php");
}
require_once("config.php");
if(isset($_POST['submit'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "select * from admintable where username = '".$email."'";
    $rs = mysqli_query($link,$sql);
    $numRows = mysqli_num_rows($rs);

    if($numRows  == 1){
        $row = mysqli_fetch_assoc($rs);
        if($password==$row['password']){
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["SUCCESS"] = "Welcome $email you are logged in";

            header("location:welcomeAdmin.php");

        }
        else{
            echo '<script> alert("Wrong Password");</script>';

        }
    }
    else{
        echo "No User found";
    }
}


?>

