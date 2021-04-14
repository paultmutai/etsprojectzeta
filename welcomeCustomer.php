<?php
session_start();
if(!isset($_SESSION["loggedin"])or $_SESSION["loggedin"]!==true){
    header("location:error.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>

            <style>
                .wrapper{
                    width: 1200px;
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
                <li class="breadcrumb-item active"><a href="logout.php">Logout</a></li>
            </ol>
        </nav>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mt-5 mb-3 clearfix">
                            <h2 class="pull-left">Drivers List</h2><br><br>
                            <form  action="search.php" method="POST">
                            <input type="text" name="valueToSearch" placeholder="Search Ward here..">
                                <i class="fa fa-search"></i><input type ="submit"  name="search" value="Search Ward" >
                            </form>
                        </div>
                        <?php
                        // Include config file
                        require_once "config.php";

                        // Attempt select query execution
                        $sql = "SELECT * FROM drivers";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '<table class="table table-bordered table-striped" width="3000px">';
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>#</th>";
                                echo "<th>First Name</th>";
                                echo "<th>Second Name</th>";
                                echo "<th>Ward</th>";
                                echo "<th>School</th>";
                                echo "<th>Email</th>";
                                echo "<th>Phone Number</th>";
                                echo "<th align='center'>Actions </th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['firstname'] . "</td>";
                                    echo "<td>" . $row['lastname'] . "</td>";
                                    echo "<td>" . $row['ward'] . "</td>";
                                    echo "<td>" . $row['school'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['pnumber'] . "</td>";
                                    echo "<td align='center'>";
                                    echo '<a href="read.php?id='. $row['id'] .'"class="mr-3" title="Call Record" data-toggle="tooltip"><span  class="fa fa-phone"></span></a>';
                                    echo "</td>";

                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }

                        // Close connection
                        mysqli_close($link);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </body>
        </html>
