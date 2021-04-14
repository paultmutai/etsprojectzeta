<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
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
            text-align: left;
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
        }
        .hd{
            text-align: center;
        }
    </style>
<body>
<div class="container-sm col-sm-8">

    <form action="processD.php" method="POST" class="signupform">
        <h2 class="hd">Driver Login Details</h2>
        <p class="hd">Enter your Email and password below:</p>
        <div>
            <div class="row p-3">
                <label>Email address:</label>
                    <input class="form-control col w-35" type="email" id="email" name="email" placeholder="paul@gmail.com" required>
                </div>
                <div class="row p-3">
                    <label>Password:</label>
                    <input class="form-control col" type="password" id="password" name="password" placeholder="password" required>
                </div>
                <div class="hd">
                    <button type="submit" name="btn" id="btn">Login</button>
                </div>
            </div>



</body>
</html>