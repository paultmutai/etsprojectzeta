<?php
require_once "config.php";
session_start();
if(!isset($_SESSION["loggedin"])or $_SESSION["loggedin"]!==true){
    header("location:error.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="contact.php">Contact Admin</a></li>
        <li class="breadcrumb-item active"><a href="logout.php">Logout</a></li>
    </ol>
</nav>
<nav class="navbar-light">
    <div class="container-fluid">
        <div class="navbar-brand">

        </div>
    </div>


</nav>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <img src="images/driver.jpg" height="200" width="250" alt="loading">
            <ul class="nav flex-column nav-pills"></ul>
            <li class="nav-link"><a href="contact.php">Contact Admin</a></li>
            <li class="nav-link"><a href="logout.php">Logout</a> </li>
        </div>

        <div class="col-md-8 bg-info">
            <div class="card border-1 p-3" >
                <h4>Hi, <span><?echo htmlspecialchars($_SESSION["email"]); ?></span>, Welcome</h4>
                <p><?echo($_POST["firstname"]);?></p>
                <p></p>
            </div>
        </div>

    </div>
</div>
</div>
</body>
</html>