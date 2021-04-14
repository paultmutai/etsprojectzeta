<?php
session_start();
if(!isset($_SESSION["loggedin"])or $_SESSION["loggedin"]!==true){
    header("location:pLogin.php");
}

require_once "config.php";
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `drivers` WHERE CONCAT(`id`, `firstname`, `ward`, `school`, `pnumber`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);

}
else {
    $query = "SELECT * FROM `drivers`";
    $search_result = filterTable($query);
}
function filterTable($query)
{
    $connect = mysqli_connect("localhost:3307", "root", "root", "ets");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Driver Search</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .wrapper{
            width: 2000px;
            margin: 0 auto;
        }
        table tr td{
            width: 150px;
            border: solid 3px #6a1a21;
            align-content: center;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="#">Reset Password</a></li>
        <li class="breadcrumb-item active"><a href="logout.php">Logout</a></li>
    </ol>
</nav>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
                    <h2 class="pull-left">Drivers List</h2><br><br>

                    <form>

    <table>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Ward</th>
            <th>School</th>
            <th>Phone Number</th>
        </tr>


        <!-- populate table from mysql database -->
        <?php while($row = mysqli_fetch_array($search_result)):?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['firstname'];?></td>
                <td><?php echo $row['lastname'];?></td>
                <td><?php echo $row['ward'];?></td>
                <td><?php echo $row['school'];?></td>
                <td><?php echo $row['pnumber'];?></td>
            </tr>
        <?php endwhile;?>
    </table>
</form>
                </div>
            </div>
        </div>
    </div></div>

</body>
</html>

