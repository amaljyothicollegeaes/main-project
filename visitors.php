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
                <h2 style="margin-left: 40px;">E Wed</h2>
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
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel" Style="color: blue;">E Wed</h5>
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
    <br><br>
    <br>
    <br>


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




        <?php

        $table = "SELECT * from profiledata where cid in (SELECT cid from status where profilestatus = 1) and cid in (SELECT cid from visitors where visited_id = $id)";
        $result = mysqli_query($con, $table);

        $table2 = "SELECT * from profiledata where cid in (SELECT cid from status where profilestatus = 1) and  cid in (SELECT cid from visitors where visited_id = $id)";
        $result2 = mysqli_query($con, $table2);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <!-- <div class="card" style="background-color:#e0ecf2;"> -->
                <div class="container rounded" style="padding: 15px;box-shadow: 1px 1px 5px 5px lightblue;background:white;color:black">
                    <div class="row">
                        <div class="col">
                            <?php
                            $value = $row["cid"];
                            $fetchimage = "SELECT * FROM photos where cid = $value";
                            $fetchimageresult = mysqli_query($con, $fetchimage);
                            // echo $value;
                            while ($fetchimageresultdata = mysqli_fetch_assoc($fetchimageresult)) {
                                // echo $fetchimageresultdata["profiles"];
                                $name = $fetchimageresultdata["profiles"];

                            ?>
                                <a href="viewprofile.php?id=<?= $row["cid"] ?>">
                                    <img class=" rounded" src="image_upload/images/<?php echo $name; ?>" style="width: 400px;height: 400px;margin-left: 30px;" alt="Error" />
                                </a>
                                <!-- <img src="s_images/Solid1.webp" style="width: 400px;height: 400px;margin-left: 30px;" border="1" alt="Error"/></a> --><?php } ?>
                        </div>







                        <div class="col">

                            <tr><br>
                                <td><span class="#" style="color:blue">ID :</span>
                                    <?php echo $row["cid"]; ?>
                                </td>
                                <br><br>
                                <?php


                                ?>
                                <td><span class="#" style="color:blue">Name :</span>
                                    <?php echo $row["fname"] . " " . $row["lname"]; ?>
                                </td>
                                <br><br>
                                <?php

                                ?>
                                <td><span class="#" style="color:blue">Education :</span>
                                    <?php echo $row["educationqualification"]; ?>
                                </td>
                                <br><br>
                                <?php

                                ?>
                                <td><span class="#" style="color:blue">Date of Birth :</span>
                                    <?php echo $row["dob"]; ?>
                                </td>
                                <br><br>
                                <!-- </div> -->

                                <!-- <div class="col"> -->
                                <?php



                                ?>
                                <td><span class="#" style="color:blue">Finance Status:</span>
                                    <?php echo $row["financialstatus"]; ?>
                                </td>
                                <br><br>
                                <?php

                                ?>
                                <td><span class="#" style="color:blue">Age :</span>
                                    <?php echo $row["age"]; ?>
                                </td>
                                <br><br>
                                <?php

                                ?>
                                <td><span class="#" style="color:blue">Height :</span>
                                    <?php echo $row["heigth"]; ?>
                                </td>
                                <br><br>
                                <?php

                                ?>
                                <td><span class="#" style="color:blue">Weight :</span>
                                    <?php echo $row["weights"]; ?>
                                </td>
                                <br>
                            </tr>
                            <?php

                            ?>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
                <br><?php

                }




                // if (mysqli_num_rows($result2) > 0) {
                //     while ($row = mysqli_fetch_assoc($result2)) {
                //         //
                //         // $zzz = mysqli_num_rows($result2);
                //         // echo "<br><br><br><br><br><br><br>ok" . $zzz;
                //     }
                // }
            } else if (mysqli_num_rows($result2) > 0) {
                while ($row = mysqli_fetch_assoc($result2)) {
                    ?>
                <!-- <div class="card" style="background-color:#e0ecf2;"> -->
                <div class="container rounded" style="padding: 15px;box-shadow: 1px 1px 5px 5px lightblue;background:white;color:black">
                    <div class="row">
                        <div class="col">
                            <?php
                            $value = $row["cid"];
                            $fetchimage = "SELECT * FROM photos where cid = $value";
                            $fetchimageresult = mysqli_query($con, $fetchimage);
                            // echo $value;
                            while ($fetchimageresultdata = mysqli_fetch_assoc($fetchimageresult)) {
                                // echo $fetchimageresultdata["profiles"];
                                $name = $fetchimageresultdata["profiles"];

                            ?>
                                <a href="viewprofile.php?id=<?= $row["cid"] ?>">
                                    <img class=" rounded" src="image_upload/images/<?php echo $name; ?>" style="width: 400px;height: 400px;margin-left: 30px;" alt="Error" />
                                </a>
                                <!-- <img src="s_images/Solid1.webp" style="width: 400px;height: 400px;margin-left: 30px;" border="1" alt="Error"/></a> --><?php } ?>
                        </div>







                        <div class="col">

                            <tr><br>
                                <td><span class="#" style="color:blue">ID :</span>
                                    <?php echo $row["cid"]; ?>
                                </td>
                                <br><br>
                                <?php


                                ?>
                                <td><span class="#" style="color:blue">Name :</span>
                                    <?php echo $row["fname"] . " " . $row["lname"]; ?>
                                </td>
                                <br><br>
                                <?php

                                ?>
                                <td><span class="#" style="color:blue">Education :</span>
                                    <?php echo $row["educationqualification"]; ?>
                                </td>
                                <br><br>
                                <?php

                                ?>
                                <td><span class="#" style="color:blue">Date of Birth :</span>
                                    <?php echo $row["dob"]; ?>
                                </td>
                                <br><br>
                                <!-- </div> -->

                                <!-- <div class="col"> -->
                                <?php



                                ?>
                                <td><span class="#" style="color:blue">Finance Status:</span>
                                    <?php echo $row["financialstatus"]; ?>
                                </td>
                                <br><br>
                                <?php

                                ?>
                                <td><span class="#" style="color:blue">Age :</span>
                                    <?php echo $row["age"]; ?>
                                </td>
                                <br><br>
                                <?php

                                ?>
                                <td><span class="#" style="color:blue">Height :</span>
                                    <?php echo $row["heigth"]; ?>
                                </td>
                                <br><br>
                                <?php

                                ?>
                                <td><span class="#" style="color:blue">Weight :</span>
                                    <?php echo $row["weights"]; ?>
                                </td>
                                <br>
                            </tr>
                            <?php

                            ?>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
                <br><?php

                }
            } else {
                    ?>
            <!-- <tr> -->
            <!-- <td colspan="6"> -->
            <center class="alert alert-info container">
                <h3>
                    No Matching Profile !!!
                </h3>
            </center>
            <!-- </td> -->
            <!-- </tr> -->
    <?php
            }
        }
    ?>
    </div>
    </div>
    </div>
    <br>






























</body>

</html>