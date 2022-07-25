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
$s = $dt->format("Y M d");
$dt->format("Y M D");


$k = 0;
if ($dt_today <= $dt) {
} else {
    $k = 1;
}

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

            <a class="navbar-brand" href="#" style="color:blue;margin-left:20px">
                <h2 style=" margin-left: 20px;">E Wed</h2>
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
                        <form class="d-flex">


                        </form>
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
        <br>
        <?php
        $fetch_proof_status = "SELECT preferance_status FROM status where cid = $id";
        $fetch_proof_status_result = mysqli_query($con, $fetch_proof_status);
        $data_fetch_proof_status_result = mysqli_fetch_assoc($fetch_proof_status_result);
        if ($data_fetch_proof_status_result["preferance_status"] == 0) {
        ?>

            <div class="container border border-info rounded" style="padding: 10px;background:white;">
                <center>
                    <br><b>
                        <h3>
                            Strict Preferance :
                        </h3>
                    </b><br><br>
                    <input type="submit" readonly value="Active" class="btn btn-outline-primary " style="margin-bottom:17px" />

                    <br>
                    <div class="row">
                        <div class="col">
                            <form name="profile" method="POST" action="preferance_status_use.php">
                                <input type="hidden" name="idzz" id="idzz" value=" <?= $id; ?> " />
                                <input type="submit" value="Use" class="btn btn-outline-primary " />
                            </form>
                        </div>
                        <div class="col">
                            <form name="profile" method="POST" action="preferance_status_revoke.php">
                                <input type="hidden" name="idzz" id="idzz" value=" <?= $id; ?> " />
                                <input type="submit" value="Revoke" class="btn btn-outline-danger " />
                            </form>
                        </div>
                    </div>
                </center>
            </div>
        <?php
        } else {
        ?>

            <div class="container border border-info rounded" style="padding: 10px;background:white;">
                <center>
                    <br><b>
                        <h3>
                            Strict Preferance :
                        </h3>
                    </b><br><br>
                    <input type="submit" readonly value="Decativate" class="btn btn-outline-danger " style="margin-bottom:17px" />

                    <br>
                    <div class="row">
                        <div class="col">
                            <form name="profile" method="POST" action="preferance_status_use.php">
                                <input type="hidden" name="idzz" id="idzz" value=" <?= $id; ?> " />
                                <input type="submit" value="Use" class="btn btn-outline-primary " />
                            </form>
                        </div>
                        <div class="col">
                            <form name="profile" method="POST" action="preferance_status_revoke.php">
                                <input type="hidden" name="idzz" id="idzz" value=" <?= $id; ?> " />
                                <input type="submit" value="Revoke" class="btn btn-outline-danger " />
                            </form>
                        </div>
                    </div>
                </center>
            </div>



        <?php
        }
        ?>
        <br>
        <div class="container border border-info rounded" style="padding: 10px;background:white;">
            <center>
                <br><b>
                    <h3>
                        Deactivate Account :
                    </h3>
                </b><br><br>


                <br>
                <div class="row">
                    <div class="col">
                        <form name="profile" method="POST" action="deactive_account.php">
                            <input type="hidden" name="idzz" id="idzz" value=" <?= $id; ?> " />
                            <input type="submit" value="Decativate" class="btn btn-outline-primary " />
                        </form>
                    </div>
                </div>
            </center>
        </div>



    <?php
    }
    ?>
    <br>
</body>

</html>