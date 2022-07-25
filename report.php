<?php
session_start();
include("connection.php");
include("function.php");


$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
    header("Location:login.php");
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


$k = 0;
if ($dt_today <= $dt) {
} else {
    $k = 1;
}









if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id_f = $_POST['ID'];
?>
    <script>
        // alert("<?php echo $id; ?>");
    </script>
    <?php
    $message = $_POST['message'];

    if ($id_f != "") {




        $query_first_time_user = "SELECT * from tbl_report where cid = $id and r_id = $id_f ";
        $result_first_time_user = mysqli_query($con, $query_first_time_user);
        if (mysqli_num_rows($result_first_time_user) > 0) {
    ?>
            <script>
                alert("You already Reported this ID once !!!");
            </script>
        <?php
        } else {
            $query = "INSERT into tbl_report (cid,r_id,message) values ($id,$id_f,'$message')";
            mysqli_query($con, $query);
            // header("Location: login.php");
        ?>
            <script>
                alert("Reported");
            </script>
        <?php
        }
    } else {
        echo "please enter some validinformation";
        ?>
        <script>
            alert("<?php echo "Unknown Error"; ?>");
        </script>
<?php
    }
}

?>
<html>

<head>
    <title>E Wed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body style="background-color:white">
    <nav class="navbar navbar-light bg-dark fixed-top">
        <div class="container-fluid">

            <a class="navbar-brand" href="#" style="color:blue;margin-left:20px">
                <h2 style=" margin-left: 20px;">E Wed</h2>
            </a>




            <?php
            $fetchimage = "SELECT * FROM photos where cid = $id";
            $fetchimageresult = mysqli_query($con, $fetchimage);

            while ($fetchimageresultdata = mysqli_fetch_assoc($fetchimageresult)) {


                $user_name = "SELECT fname,lname FROM login where id = $id";
                $user_name_result = mysqli_query($con, $user_name);
                while ($user_name_result_data = mysqli_fetch_assoc($user_name_result)) {
            ?>
                    <h7 style="color:white">
                        <?php

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
                        <h4 class="offcanvas-title" id="offcanvasNavbarLabel" Style="color: blue;">E Wed</h4>
                        <button style="border:1px solid white;" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                            <h2 style="margin-top:-15px;color:blue">
                                <b>x</b>
                            </h2>
                        </button>
                    </div>

                    <div class="offcanvas-body">
                        <?php
                        include("side_menu.php");
                        ?>
                    </div>
                </div>
        </div>
    </nav><br><br><br><br>

    <?php
    if ($k == 1) {
    ?>
        <script>
            alert("please Pay to Use !!!");
        </script>

        <?php

        ?>
        </center>
        <div class="container">
            <br><br><br>
            <div class="alert alert-primary container" style="text-align:center">
                <?php echo "Please pay to use !!!"; ?>
            </div>
        </div>
        </center>
    <?php

    } else {
    ?>




        <center>
            <div class="container rounded " style="box-shadow: 1px 1px 5px 5px lightblue;background-color: #e8eff4">
                <div class=" col">



                    <?php
                    $user_name = "SELECT fname,lname FROM login where id = $id";
                    $user_name_result = mysqli_query($con, $user_name);
                    while ($user_name_result_data = mysqli_fetch_assoc($user_name_result)) {

                        $name = $user_name_result_data['fname'] . ' ' . $user_name_result_data['lname'];

                    ?>

                        <form method="POST" style="text-align:start">
                            <br>
                            <div style="background-color:white;padding:0.60%;background-color: blue;border-radius:5px;">
                                <center>
                                    <h3 style="color:white">Report Account</h3>
                                </center>
                            </div>
                            <br>

                            <div class="control-group">
                                <div class="controls">
                                    <label for="exampleInputEmail1" class="form-label">Name :</label>
                                    <input type="text" class="form-control" placeholder="Full Name" value="<?php echo $name ?>" id="fullname" required data-validation-required-message="Please enter your name" readonly />
                                    <p class="help-block"></p>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <label for="exampleInputEmail1" class="form-label">Your ID :</label>
                                    <input type="text" class="form-control" placeholder="Account ID" value="<?php echo $id ?>" id="email" required data-validation-required-message="Please enter your email" readonly />
                                </div>
                            </div><br>

                            <div class="control-group">
                                <div class="controls">
                                    <input type="text" class="form-control" placeholder="Account ID to be reported" id="ID" name="ID" required data-validation-required-message="Please enter your name" required />
                                </div>
                            </div><br>

                            <div class="control-group">
                                <div class="controls">
                                    <textarea rows="10" cols="100" class="form-control" placeholder="Message" id="message" name="message" required data-validation-required-message="Please enter your message" minlength="5" data-validation-minlength-message="Min 5 characters" maxlength="999" style="resize:none" required></textarea>
                                </div>
                            </div>



                        <?php
                    }
                        ?>

                        <div id="success" style="text-align:center"> <br>
                            <input type="submit" class="btn btn-primary pull-right" value="submit" />
                            <input type="reset" class="btn btn-primary pull-right" value="reset" /><br><br>
                        </div>
                        </form>
                </div>
            </div>
        </center>


    <?php
    }
    ?>



</body>

</html>