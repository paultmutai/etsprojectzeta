<?php
session_start();
if(!isset($_SESSION["loggedin"])or $_SESSION["loggedin"]!==true){
    header("location:error.php");
}
require_once("config.php");
if(isset($_POST['btn'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "select * from customers where email = '".$email."'";
    $rs = mysqli_query($link,$sql);
    $numRows = mysqli_num_rows($rs);

    if($numRows  == 1){
        $row = mysqli_fetch_assoc($rs);
        if(password_verify($password,$row['password'])){
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["SUCCESS"] = "Welcome $email you are logged in";
            echo "<h1><center> Login successful </center></h1>";
            header("location:welcomeCustomer.php");
            echo "Password verified";
        }
        else{
            echo "Wrong Password";
        }
    }
    else{
        echo "No User found";
    }
}