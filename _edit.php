<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$firstname = $lastname = $ward = $school = $pnumber = $email ="";
$firstname_err = $lastname_err = $ward_err =$school_err = $pnumber_err= $email_err ="";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate First name
    $input_fname = trim($_POST["firstname"]);
    if(empty($input_fname)){
        $firstname_err = "Please enter a name.";
    } elseif(!filter_var($input_fname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $firstname_err = "Please enter a valid name.";
    } else{
        $firstname = $input_fname;
    }
    // Validate Last name
    $input_lname = trim($_POST["lastname"]);
    if(empty($input_lname)){
        $lastname_err = "Please enter a name.";
    } elseif(!filter_var($input_lname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $lastname_err = "Please enter a valid name.";
    } else{
        $lastname = $input_lname;
    }
    // Validate Ward
    $input_ward = trim($_POST["ward"]);
    if(empty($input_ward)){
        $ward_err = "Please enter the Ward";
    } elseif(!filter_var($input_ward, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $ward_err = "Please enter a valid Ward.";
    } else{
        $ward = $input_ward;
    }
    // Validate School
    $input_school = trim($_POST["school"]);
    if(empty($input_school)){
        $school_err = "Please enter the School";
    } elseif(!filter_var($input_school, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $school_err = "Please enter a valid School.";
    } else{
        $school = $input_school;
    }

    // Validate pnumber
    $input_pnumber = trim($_POST["pnumber"]);
    if(empty($input_pnumber)){
        $pnumber_err = "Please enter the Phone Number";
    } elseif(!filter_var($input_pnumber, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $pnumber_err = "Please enter a valid Number.";
    } else{
        $pnumber = $input_pnumber;
    }
    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter the Email";
    } elseif(!filter_var($input_email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $email_err = "Please enter a valid Email.";
    } else{
        $email = $input_email;
    }

    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($lastname_err) && empty($ward_err)&& empty($school_err)&& empty($pnumber_err)&& empty($email_err)){
        // Prepare an update statement
        $sql = "UPDATE drivers SET firstname=?, lastname=?, ward=?, school=?, pnumber=?,email=? WHERE id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_firstname, $param_lastname, $param_ward, $param_school, $param_pnumber, $param_email);

            // Set parameters
            $param_name = $firstname;
            $param_lastname=$lastname;
            $param_ward=$ward;
            $param_school = $school;
            $param_pnumber = $pnumber;
            $param_email = $email;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM drivers WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $ward = $row['ward'];
                    $school = $row['school'];
                    $pnumber=$row['pnumber'];
                    $email=$row['email'];

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5">Update Record</h2>
                <p>Please edit the input values and submit to update the employee record.</p>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $firstname; ?>">
                        <span class="invalid-feedback"><?php echo $firstname_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastname; ?>">
                        <span class="invalid-feedback"><?php echo $lastname_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Ward</label>
                        <input type="text" name="ward" class="form-control <?php echo (!empty($ward_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ward; ?>">
                        <span class="invalid-feedback"><?php echo $ward_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>School</label>
                        <input type="text" name="school" class="form-control <?php echo (!empty($school_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $school; ?>">
                        <span class="invalid-feedback"><?php echo $school_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="pnumber" class="form-control <?php echo (!empty($pnumber_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pnumber; ?>">
                        <span class="invalid-feedback"><?php echo $pnumber_err;?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

