<?php
session_start();
include("function.php");
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ewed";
$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $condition = $_POST['conditions'];
    if ($mail != "") {
        $query = "insert into login (fname,lname,email,password,phone) values ('$fname','$lname','$mail','$password',$phone)";
        mysqli_query($con, $query);
        header("Location: login.php");
    } else {
        echo "please enter some validinformation";
    }
}

?>


<html>

<head>
    <title>register</title>
    <link rel="stylesheet" type="text/css" href="css-reg.css">

    <script>
        function sub() {
            var mail = document.getElementById("mail").value;
            var password = document.getElementById("password").value;
            var cpassword = document.getElementById("cpassword").value;
            var conditions = document.getElementById("conditions").value;
            if ((document.getElementById("fname").value == '') || (document.getElementById("lname").value == '')) {
                document.getElementById("demo").innerHTML = 'Enter a  your name';
            } else {
                if (document.getElementById(id = "mail").value.length == 0) {
                    document.getElementById("demo").innerHTML = 'Enter your E-mail ID ';
                } else {
                    if (document.getElementById(id = "password").value == '') {
                        document.getElementById("demo").innerHTML = 'Please enter password';
                    } else {
                        if ((document.getElementById(id = "password").value.length > 0) && (document.getElementById(id = "password").value.length < 8)) {
                            document.getElementById("demo").innerHTML = 'Password must contain atleast 8 characters.';

                        } else {
                            if ((document.getElementById("password").value) != (document.getElementById(id = "cpassword").value)) {
                                document.getElementById("demo").innerHTML = 'Password not same';
                                document.formregister.password.focus();
                                return false;
                            } else {
                                if (document.getElementById("phone").value.length != '10') {
                                    document.getElementById("demo").innerHTML = "Enter a valid phone number";
                                } else {
                                    if ((document.getElementById("conditions").checked) != true) {
                                        document.getElementById("demo").innerHTML = 'Agree the condition';
                                        document.formregister.password.focus();
                                        return false;
                                    } else {
                                        document.getElementById("demo").innerHTML = 'Registration completed';
                                    }
                                    return true;
                                }

                            }

                        }
                    }
                }
            }

        }
    </script>

</head>

<body>
    <div class="loginbox">
        <img src="avatar.png" class="avatar">
        <form name="formregister" method="POST" onsubmit="sub()">
            <h1>REGISTER</h1>
            <p>Name:</p><input type="text" name="fname" id="fname" placeholder="First-name" value="" required />
            <input type="text" id="lname" name="lname" placeholder="Last-name" value="" required />
            <p>E-Mail:<input type="email" id="mail" name="mail" placeholder="Enter Email " value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required /></p>
            <p>Password:<input type="password" name="password" id="password" placeholder="Password" value="" pattern=".{8,}" required /></p>
            <p>Confirm-Password:<input type="password" id="cpassword" placeholder="Confirm-password" value="" pattern=".{8,}" required /></p>
            <p>Phone:<input type="tel" id="phone" name="phone" placeholder="eg:-8080808080" value="" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required /></p>
            <center>
                <p><input type="checkbox" id="conditions" name="conditions" value="" required><a href="#">I agree the terms and conditions</a></p>
                <h2 style="color:red" id="demo"></h2>
                <input type="submit" value="register" onclick="sub()"><br><br>
                <a href="Login.php" style="font-weight:bold;">Go back</a>
            </center>
        </form>
    </div>
</body>

</html>