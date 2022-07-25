<br>
<br><br>
<br><br>
<br>
<?php
session_start();
// include("connection.php");
include("function.php");
//include("menubar.php");
$id = $_SESSION['id'];

if (!isset($_SESSION['id'])) {
    header("Location:login.php");
}

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ewed";
$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);



if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $choose = $_POST['choose'];

    if ($choose) {
        header("Location: PaytmKit/TxnTest.php?choose=" . $choose);
    }
}



$query_account_validity = "SELECT * FROM tbl_account_validity where cid = $id";
$result_account_validity = mysqli_query($con, $query_account_validity);
$data_result_account_validity = mysqli_fetch_assoc($result_account_validity);

$month = $data_result_account_validity["month"];
$url = $data_result_account_validity["timestamp_account"];
$today = date("Y-m-d");
"today" . $today;
$dt_today = new DateTime("$today");
$dt_today->format("Y M D");
$fullArray = explode(' ', $url);
$dt = strval($fullArray[0]);
$fullArray2 = explode('-', $dt);
$dt_yy = strval($fullArray2[0]);
$dt_mm = strval($fullArray2[1]);
$dt_dd = strval($fullArray2[2]);
$check_datess = "$dt_yy-$dt_mm-$dt_dd";
$dt = new DateTime("$check_datess");
$dt->format("Y M D");
$dt->modify("+5 month");
$dt->format("Y M D");
$dt_today->format("Y M D");
$dt->format("Y M D");





?>
<html>

<head>
    <title>E Wed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</head>

<body style="background-color:#e8eff4">

    <nav class="navbar navbar-light bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:blue;">
                <h2 style="margin-left:40px">E Wed</h2>
            </a>


            <?php
            $fetchimage = "SELECT * FROM photos where cid = $id";
            $fetchimageresult = mysqli_query($con, $fetchimage);
            // echo $value;
            while ($fetchimageresultdata = mysqli_fetch_assoc($fetchimageresult)) {
                // echo $fetchimageresultdata["profiles"];

                $user_name = "SELECT fname,lname FROM login where id = $id";
                $user_name_result = mysqli_query($con, $user_name);
                while ($user_name_result_data = mysqli_fetch_assoc($user_name_result)) {
            ?>
                    <h7 style="color:white">
                        <?php
                        // echo "user";
                        echo $user_name_result_data['fname'];
                        ?>
                        <br>
                    <?php
                    echo $user_name_result_data['lname'];
                }
                    ?>
                    </h7>
                    <?php

                    $name = $fetchimageresultdata["profiles"];
                    ?>
                    <img src="image_upload/images/<?php echo $name; ?>" style="width: 40px;height: 40px;border-radius:25px;border:2px solid white;margin: -75% ;" alt="Error" />
                <?php } ?>



                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="background:grey">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div style="color:blue;background:black;border:white;" class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color:blue">E Wed</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">


                        <?php
                        include("side_menu.php");
                        ?>

                        <form class="d-flex">

                        </form>
                    </div>
                </div>
        </div>
    </nav>




    <br><br><br><br>
    <center style="padding: 15px;box-shadow: 1px 1px 5px 5px lightblue;background:white;color:black;margin-right:5%;margin-left:9%;color:blue" class="container rounded">
        <div style="background-color:blue;color:white;padding:1%">
            <h2>Payment<h2>
        </div>
    </center><br>


    <form name="profile" method="POST" style="padding: 15px;box-shadow: 1px 1px 5px 5px lightblue;background:white;color:black;margin-right:5%;margin-left:9%;" class="container rounded">
        <br>
        <?php
        $table = "SELECT * from partnerdetails where cid = $id";
        $result = mysqli_query($con, $table);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="container">



                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Per Month 100 Rs. Choose number of months</label>


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Choose no. of months</label><label style="color:red;"> *</label>

                        <select class="form-select col-4" id="choose" name="choose">
                            <?php
                            $b = 1;

                            for ($i = 1; $i < 61; $i++) {
                            ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>
                </div>




































                <br>
                <div class="row">
                    <div class="col">
                        <center><button type="submit" class="btn btn-primary" value="Login" onclick="profileentry()">Submit</button></center>
                    </div>
                </div>
            </div>




















        <?php } ?>
    </form>














    <br>
</body>

</html>