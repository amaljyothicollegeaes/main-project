<?php
session_start();
include("connection.php");
include("function.php");


$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
    header("Location:login.php");
}
?>
<html>

<head>
    <title>E Wed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
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
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel" Style="color: blue;">E Wed</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="font-weight:bold;">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="http://localhost/ewed/personaldetail.php?id=<?= $id ?>">View and Edit Profile</a>
                                <!-- <a class="nav-link " aria-current="page" href="http://localhost/ewed/editprofile.php?id=<?= $id ?>">View and Edit Profile</a> -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="main.php">Matches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="my_matches.php">My Matches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="requests.php?id=<?= $id ?>">Requests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                            <br>
                        </ul>
                        <form class="d-flex">
                            <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button> -->
                        </form>
                    </div>
                </div>
        </div>
    </nav>
    <br><br>
    <br>
    <br>
    <!-- <?php echo $id; ?> -->






    <?php

    $table = "SELECT * from profiledata where cid in (SELECT cid from status where profilestatus = 1) and sex != (SELECT sex from profiledata where cid = $id) and cid in (SELECT cid from matchaccept where matcheAccept = 1 and mid = $id)";
    $result = mysqli_query($con, $table);

    $table2 = "SELECT * from profiledata where cid in (SELECT cid from status where profilestatus = 1) and sex != (SELECT sex from profiledata where cid = $id) and cid in (SELECT mid from matchaccept where matcheAccept = 1 and cid = $id)";
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
                            <a href="viewprofile_chat.php?id=<?= $row["cid"] ?>">
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
                            <a href="viewprofile_chat.php?id=<?= $row["cid"] ?>">
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
    ?>
    </div>
    </div>
    </div>
    <br>






























</body>

</html>