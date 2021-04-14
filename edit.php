<?php

    require_once "config.php";
$firstname = $lastname = $ward = $school = $pnumber = $email ="";
    if (isset($_POST["id"]) and !empty ($_POST["id"])){
        //get hidden input
        $id=$_POST["id"];

        //pick form updated values
        $updated_fname=$_POST['firstname'];
        $updated_lname=$_POST['lastname'];
        $updated_ward=$_POST['ward'];
        $updated_school=$_POST['school'];
        $updated_pnumber=$_POST['pnumber'];
        $updated_email=$_POST['email'];
        
        //run the update query
        $sql="UPDATE `customers` SET `firstname`='$updated_fname',`lastname`='$updated_lname',`ward`='$updated_ward',`school`='$updated_school',`pnumber`='$updated_pnumber',`email`='$updated_email' WHERE id='id'";

        $result=mysqli_query($link,$sql);

        if($result){
            echo "<div class='alert alert-success' role='alert'>Record was updated successfully</div>";
        }else{
            echo"Error executing query $sql".mysqli_error($link);
        }

    }else{
        //pick id parameter and values

        if(isset($_GET["id"]) and !empty ($_GET["id"])){
            
            $id=trim($_GET["id"]);

            $sql="SELECT * FROM `customers` WHERE id='$id'";

            $result=mysqli_query($link,$sql);

            if($result){
                if(mysqli_num_rows($result)==1){

                    //fetch the data
                    $row = mysqli_fetch_array($result);

                    //receive individual data
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $ward = $row['ward'];
                    $school = $row['school'];
                    $pnumber=$row['pnumber'];
                    $email=$row['email'];
                    
                }

            }else{
                echo "Error executing query $sql".mysqli_error($link);
            }


        }else{
            echo "ID parameter was not found";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT RECORD</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <h2>Update Record</h2>
            <p>Please edit the input values to submit to this form</p>
        </div>
        <div>
            <form action="edit.php" method="post" enctype="multipart/form-data">
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" id="" class="form-control" name="firstname" value="<?php echo $firstname;?>" />
                            <label class="form-label" for="">First Name</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" id="" class="form-control" name="lastname" value="<?php echo $lastname;?>" />
                            <label class="form-label" for="">Last Name</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" id="" class="form-control" name="ward" value="<?php echo $ward;?>" />
                            <label class="form-label" for="">Ward</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" id="" class="form-control" name="school" value="<?php echo $school;?>" />
                            <label class="form-label" for="">School</label>
                        </div>
                    </div>



                    <div class="col">
                        <div class="form-outline">
                            <input type="text" id="" class="form-control" name="pnumber" value="<?php echo $pnumber;?>" />
                            <label class="form-label" for="">Phone Number</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="email" id="" class="form-control" name="email" value="<?php echo $email;?>" />
                            <label class="form-label" for="">Email</label>
                        </div>
                    </div>

                <div class="text-center">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <button type="submit" name="uploaddata" class="btn btn-primary btn-block mb-4 " >UPDATE</button>
                </div>
            </form>
            <div class="text-center m-3 border-2">
                <p><a href="Admin2.php" class = "btn btn-outline-primary text-center m-3">BACK TO HOME</a></p>
            </div>

        </div>
    </div>

    
</body>
</html>

