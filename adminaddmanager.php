<?php
include("connection.php");
include("function.php");
include("menubar2.php");

$id = $_SESSION['id'];

// echo $id;



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];

    if ($mail != "") {
        $query = "INSERT into login (fname,lname,email,password,phone) values ('$fname','$lname','$mail','$password',$phone)";
        $result = mysqli_query($con, $query);
        if ($result) {
            $query3 = "SELECT * from login where email = '$mail' and  password = '$password' limit 1";
            $result3 = mysqli_query($con, $query3);
            while ($row = mysqli_fetch_assoc($result3)) {
                $cid = $row['id'];
                if ($result3) {
                    $query1 = "UPDATE status set profilestatus = 2 ,userlevel = 1 where cid = $cid ";
                    $result1 = mysqli_query($con, $query1);
                    if ($result1) {
                        header("Location: adminadd.php");
                    }
                }
            }
        }
    } else {
        echo "please enter some validinformation";
    }
}







?>
<html>

<head>
    <title>E Wed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>



</head>

<body>
    <form name="profile" method="POST" class="border border-4 border-dark rounded" style="margin-right:4%;margin-left:4%;"><br>
        <center>
            <h3 class="bg-dark rounded" style="color:blue;margin-right:1%;margin-left:1%;padding:1%">ADD MANAGING USERS</h3>
        </center><br><br>

        <div class="container">

            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">First Name</label><label style="color:red;"> *</label>
                        <input type="text" value="" class="form-control" id="fname" name="fname" placeholder="Enter First Name">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Last Name</label><label style="color:red;"> *</label>
                        <input type="text" value="" class="form-control" id="lname" name="lname" placeholder="Enter Second Name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">E Mail</label><label style="color:red;"> *</label>
                        <!-- <input type="text" value="<?php echo $row['fname'] ?>" class="form-control" id="fname" name="fname"> -->
                        <input type="email" class="form-control" id="mail" name="mail" placeholder="Enter Email" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required />
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label><label style="color:red;"> *</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" pattern=".{8,}" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Phone Number</label><label style="color:red;"> *</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="eg:-8080808080" value="" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <center><button type="submit" class="btn btn-primary" value="Login" onclick="profileentry()">Submit</button></center>
                </div>
            </div><br>

        </div>
    </form>













</body>