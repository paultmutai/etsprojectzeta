<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Sign up Form</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
<style>

    body{
        background-color: #343a40;
        font-family: "Comic Sans MS";
        font-weight: bold;
    }
    .signupform{
        background-color:#ece1be;
        margin: 15px;
        padding: 15px;
        border-radius: 15px;

    }
    button{
        font-weight: bolder;
        width: 50%;
        height: 60px;
        color: black;
        border-radius: 25px;
        alignment: center;
    }
    .hd{
text-align: center;
    }
</style>
<div>
<div class="container-sm col-sm-8">

        <form action="dhandlesignup.php" method="post" class="signupform">
            <h2 class="hd">Driver Registration Form</h2>
            <p class="hd">Create an account with us by filling the details below:</p>
            <div>
                <div class="row p-3">
                   <div class="col">
                       <label>First Name</label>
                       <input class="form-control col"  type="text" name="firstname" placeholder="Firstname" required>
                   </div>
                    <div class="col">
                        <label>Second Name</label>
                        <input class="form-control col" type="text" name="lastname" placeholder="Lastname" required>
                    </div>
                </div>
                <div class="row p-3">
                        <div class="col">
                            <label>Enter name of your WARD:</label>
                            <input class="form-control col" type="text" name="ward" placeholder="Piave" required>
                        </div>
                    <div class="col">
                            <label>Enter NEAREST School:</label>
                            <input class="form-control col" type="text" name="schools" placeholder="Kilimo Pry School" required>
                    </div>


                </div>
                <div>
                        <div class="row p-3">
                    <label>Phone Number</label>
                    <input class="form-control col" type="text" name="pnumber" placeholder="0720849506" required>
                </div>
                <div class="row p-3">
                    <label>Email Address</label>
                    <input class="form-control col" type="email" name="email" placeholder="paul@gmail.com" required>
                </div>

                <div class="row p-3">
                    <label>Enter Password:</label>
                    <input class="form-control col" type="password" name="password" placeholder="password" required>
                </div>
                <div class="row p-3">
                    <LABEL>Confirm Password:</LABEL>
                    <input class="form-control col" type="password" name="confpassword" placeholder="cornfirm password" required>
                </div>
                <div class="row p-3">
                    <div class="form-check" >
                        <input class="form-check-input" type="checkbox">
                        <label  class="form-check-label">I accept terms and conditions</label>
                    </div></div>
                <div class="hd">
                    <button type="submit">REGISTER</button>
                </div>
            </div>

        </form>
<div class="row">
    <p>Already have an account?<a href="dLogin.php">Login</a></p>
    </div>
</div>
</div>
</body>
</html>