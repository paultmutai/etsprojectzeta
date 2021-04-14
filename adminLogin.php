<?php
include_once('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<header>
    <div class="container center-div shadow ">
        <div class="heading text-center mb-5 text-uppercase text-white"> ADMIN LOGIN </div>
        <div class="container row d-flex flex-row justify-content-center mb-5">
            <div class="admin-form shadow p-2 ">
                <form action="pAdmin.php" method="POST">
                    <div class="form-group">
                        <label>Email ID</label>
                        <input type="text" name="email" value="" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" value="" class="form-control" autocomplete="off">
                    </div>
                    <input type="submit" class="btn btn-success" name="submit" >
                </form>
            </div>
        </div>
    </div>
</header>

</body>
</html>


