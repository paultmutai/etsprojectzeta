<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="cont.css">
    <title>Emergency Transport System</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active"><a href="pLogin.php">Customer Login</a></li>
        <li class="breadcrumb-item active"><a href="dLogin.php">Driver Login</a></li>
    </ol>
</nav>
<main>
    <div class="container">
        <h3>Contact Form</h3>
        <form action="" id="contact_form">
            <label >Full Names</label>
            <input type="text" id="name"  required placeholder="Paul"/>
            <br>
            <label >Subject</label>
            <input type="text" id="subject"  required placeholder="Subject"/>
            <br>

            <label>Email Address:</label>
            <input type="email" id="email"  required placeholder="xxx@domain.com"/>
            <br>
            <label>Message</label><br>
            <textarea id="body" cols="30" rows="10" placeholder="Enter your message here ..." required> </textarea>
            <div class="center">
                <input type="submit"  onclick="sendEmail()"  value="Submit">
            </div>
        </form>
    </div>
</main>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    function sendEmail() {
        var name = $("#name");
        var subject = $("#subject");
        var email = $("#email");
        var body = $("#body");

        if (isNotEmpty(name) && isNotEmpty(subject) && isNotEmpty(email) && isNotEmpty(body)) {
            $.ajax({
                url: 'handlecontact.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    name: name.val(),
                    subject: subject.val(),
                    email: email.val(),
                    body: body.val()
                }, success: function (response) {
                    $('#contact_form')[0].reset();
                    $('.sent-notification').text("Message Sent Successfully.");
                }
            });
        }
    }

    function isNotEmpty(caller) {
        if (caller.val() == "") {
            caller.css('border', '1px solid red');
            return false;
        } else
            caller.css('border', '');

        return true;
    }
</script>
</body>