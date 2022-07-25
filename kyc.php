<?php
session_start();

include("function.php");

// echo "<br><br><br><br><br><br><br>";
$id = $_SESSION['id'];


if (!isset($_SESSION['id'])) {
    header("Location:login.php");
}

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ewed";
$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);





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
                <h2 style="margin-left:20px">E Wed</h2>
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
                <button class=" navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="background:grey">
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
                    </div>
                </div>
        </div>
    </nav>


    <br><br><br><br>
    <div class="container" style="padding: 15px;box-shadow: 1px 1px 5px 5px lightblue;border-radius:5px;background-color:white">
        <center>
            <h3 style="color:blue">ID Proofs</h3>
        </center>
    </div><br>

    <?php
    $fetchimage = "SELECT * FROM tlb_proof where cid = $id";
    $fetchimageresult = mysqli_query($con, $fetchimage);
    $fetchimageresultdata = mysqli_fetch_assoc($fetchimageresult);
    $my = $fetchimageresultdata["id_proof_pic"];
    $father = $fetchimageresultdata["father"];
    $mother = $fetchimageresultdata["mother"];

    ?>



    <div class="container" style="padding: 15px;box-shadow: 1px 1px 5px 5px lightblue;border-radius:5px;background-color:white">
        <div class="container">
            <h4>
                <center style="color:white;background-color:blue;margin-top: 10px;padding: 10px;">MY DOCUMENTS</center>
            </h4>
        </div>

        <div class="col">
            <div class="mb-3">
                <a href="image_upload/change_document_front.php" class="btn btn-outline-primary" style="color:black;float:right;margin-right:30px;margin-top:30px">Edit</a>

            </div>
        </div>




        <?php
        $fetch_proof_status = "SELECT proof_status FROM status where cid = $id";
        $fetch_proof_status_result = mysqli_query($con, $fetch_proof_status);
        $data_fetch_proof_status_result = mysqli_fetch_assoc($fetch_proof_status_result);
        if ($data_fetch_proof_status_result["proof_status"] == 0) {
        ?>
            <input type="submit" readonly value="Under Processing" class="btn btn-outline-primary " style="color:black;float:right;margin-right:30px;margin-top:30px" />

        <?php
        } elseif ($data_fetch_proof_status_result["proof_status"] == 2) {
        ?>
            <input type="submit" readonly value="Document Rejected" class="btn btn-outline-danger " style="color:black;float:right;margin-right:30px;margin-top:30px" />
        <?php
        } else {
        ?>
            <input type="submit" readonly value="Document Approved" class="btn btn-outline-primary " style="color:black;float:right;margin-right:30px;margin-top:30px" />




        <?php
        }
        ?>







        <center>
            <img class="rounded" src="image_upload/images/<?php echo $my; ?>" style="width: 50%;height: 50%;margin: 30px;" alt="Error" />
        </center>

        <div class="container">

            <h4>
                <center style="color:white;background-color:blue;margin-top: 10px;padding: 10px;">FATHER'S DOCUMENTS</center>
            </h4>

        </div>
        <center>
            <img class="rounded" src="image_upload/images/<?php echo $father; ?>" style="width: 50%;height: 50%;margin: 30px;" alt="Error" />
        </center>

        <div class="container">

            <h4>
                <center style="color:white;background-color:blue;margin-top: 10px;padding: 10px;">MOTHER'S DOCUMENTS</center>
            </h4>

        </div>
        <center>
            <img class="rounded" src="image_upload/images/<?php echo $mother; ?>" style="width: 50%;height: 50%;margin: 30px;" alt="Error" />
        </center>
    </div>






</body>
<br>

</html>