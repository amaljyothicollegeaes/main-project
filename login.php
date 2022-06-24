<?php
session_start();
include("menubar.php");
include("function.php");
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ewed";
$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $password = $_POST['password'];
  $mail = $_POST['mail'];

  if (($mail != "") && ($password != "")) {
    $query = "select password,email,id from login where email = '$mail' and  password = '$password' limit 1";
    $result = mysqli_query($con, $query);
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        if ($data['password'] == $password &&  $data['email'] == $mail) {
          $_SESSION['id'] = $data['id'];
          $id = $_SESSION['id'];

          $profilestatus = "select profilestatus from status where cid = $id ";
          $profilestatusresult = mysqli_query($con, $profilestatus);
          if (mysqli_num_rows($profilestatusresult) > 0) {
            $profilestatusdata = mysqli_fetch_assoc($profilestatusresult);
            if ($profilestatusdata['profilestatus'] == 0 || $profilestatusdata['profilestatus'] == 4 || $profilestatusdata['profilestatus'] == 5) {
?>
              <script>
                alert('Your are under processing,login after some times // your are being blacklisted');
              </script>
            <?php
              unset($_SESSION['id']);
            } else if ($profilestatusdata['profilestatus'] == 3) {
            ?>
              <script>
                alert('<?php echo $id, 'welcome admin'; ?>');
              </script>
            <?php
              header("Location: admin.php");
            } else if ($profilestatusdata['profilestatus'] == 2) {
            ?>
              <script>
                alert('<?php echo $id, 'welcome admin'; ?>');
              </script>
            <?php
              header("Location: managing.php");
            } else {
            ?>
              <script>
                alert('<?php echo $id; ?>');
              </script>
              <?php


              $userlevel = "select userlevel from status where cid = '$id' limit 1";
              $userlevelresult = mysqli_query($con, $userlevel);

              if ($userlevelresult) {
                if (mysqli_num_rows($userlevelresult) > 0) {
                  $userleveldata = mysqli_fetch_assoc($userlevelresult);
                  if ($userleveldata['userlevel'] == 0) {
                    echo "hello user";

              ?>
                    hello
        <?php

                    header("Location: profile.php");
                  } else {
                    header("Location: main.php");
                  }
                }
              }

              //header("Location: main.php");
            }
          }
        }
      } else {
        ?>
        <script>
          alert('Incorrect password/mail id');
        </script>
<?php
      }
    }
  } else {
    echo "wrong password";
  }
}

?>

<html>

<head>
  <title>login</title>
  <link rel="stylesheet" type="text/css" href="login.css">

  <script language="javascript" type="text/javascript">
    function sub() {
      var mail = document.getElementById("mail").value;
      var password = document.getElementById("password").value;
      if (document.getElementById(id = "mail").value.length == 0) {
        document.getElementById("demo").innerHTML = 'Enter a valid mail id ';
      } else {
        if (document.getElementById(id = "mail").value.length < 10) {
          document.getElementById("demo").innerHTML = 'Enter a valid mail id';
        } else {
          if (document.getElementById(id = "password").value == '') {
            document.getElementById("demo1").innerHTML = 'Please enter password';
            document.getElementById("demo").innerHTML = '';
          } else {
            if (document.getElementById(id = "password").value.length < 8) {
              document.getElementById("demo1").innerHTML = 'Password must contain atleast 8 letters';
            } else {
              document.getElementById("demo1").innerHTML = '';
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
    <h1>LOGIN HERE</h1>
    <br>
    <form method="POST">
      <p>E-Mail:</p><input type="mail" id="mail" name="mail" placeholder="Enter Email " pattern=".{10,}" required />
      <center>
        <h6 style="color:red;" id="demo"></h6>
      </center>
      <p>Password:</p><input type="password" id="password" name="password" placeholder="Password" pattern=".{8,}" required />
      <center>
        <h6 style="color:red;" id="demo1"></h6>
      </center><br>
      <center><input type="submit" value="Login" onclick="sub()"></center>
    </form>
    <br>
    <center><a href="">Forgot password ?</a>
      <a href="register.php">Don't have an account ?</a>
    </center>
  </div>

</body>

</html>