<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location:../login.php");
}
include("db_connection.php");
$e = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $ids = $_SESSION['id'] = $_GET['id'];
}

if (isset($_GET["error"])) {
    $e = $_GET["error"];
    if ($e == "2") {
        $e = "<div class='alert alert-danger text-center alert-dismissible'>
                
                <h5> Size Too Large,Image size should be less than 1mb.</h5>
            </div>";
    } elseif ($e == "3") {
        $e = "<div class='alert alert-danger text-center alert-dismissible'>
                
                <h5>File Type Not Supported...</h5>
            </div>";
    } elseif ($e == "1") {
        $e = "<div class='alert alert-danger text-center alert-dismissible'>
                
                <h5>Unknown Error Occurred...</h5>
            </div>";
    } else {
        $e = "";
    }
}
?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</head>

<body>


    <nav class="navbar navbar-light bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:blue;margin-left:20px">
                <h2 style="margin-left:20px">E Wed</h2>
            </a>



            <?php
            $fetchimage = "SELECT * FROM photos where cid = $ids";
            $fetchimageresult = mysqli_query($connection, $fetchimage);
            // echo $value;
            while ($fetchimageresultdata = mysqli_fetch_assoc($fetchimageresult)) {
                // echo $fetchimageresultdata["profiles"];

                $user_name = "SELECT fname,lname FROM login where id = $ids";
                $user_name_result = mysqli_query($connection, $user_name);
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
                    <img src="images/<?php echo $name; ?>" style="width: 40px;height: 40px;border-radius:25px;border:2px solid white;margin: -75% ;" alt="Error" />
                <?php } ?>





                <button class=" navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="background:grey">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color:blue">E Wed</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="font-weight:bold;">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="../personaldetail.php?id=<?= $id ?>">View and Edit Profiles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="../main.php">Matches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../my_matches.php">My Matches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../requests.php?id=<?= $id ?>">Requests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../logout.php">Logout</a>
                            </li>
                            <br>
                        </ul>

                    </div>
                </div>
        </div>
    </nav><br><br><br><br>





    <center><br>
        <div class="container" style="padding: 15px;box-shadow: 1px 1px 5px 5px lightblue;border-radius:5px;">
            <label for="formFile" class="form-label" style="color:blue;font-size:x-large;"><b>Your Images</b></label>
        </div><br><br>
    </center>
    <div class="container" style="padding: 15px;box-shadow: 1px 1px 5px 5px lightblue;border-radius:5px;">
        <form name="upload" method="post" action="changeimages.php" enctype="multipart/form-data" style="margin: 50px;">

            <?php
            echo $e;
            ?>

            <div class="mb-4">
                <center>
                    <div style="background-color:blue">
                        <label for="formFile" class="form-label" style="color:white;">Profile Image</label>
                    </div><br>
                    <?php

                    $fetchimage = "SELECT * FROM photos where cid = $id";
                    $fetchimageresult = mysqli_query($connection, $fetchimage);
                    while ($fetchimageresultdata = mysqli_fetch_assoc($fetchimageresult)) {
                        $name = $fetchimageresultdata["profiles"];
                    ?>
                        <!-- <a href="image_upload/changeimagefront.php?id=<?= $id ?>"> -->
                        <img class="img-thumbnail rounded" src="images/<?php echo $name; ?>" style="width: 200px;height: 200px;" border="1" alt="Error" />
                        <!-- </a> -->
                    <?php
                    }
                    ?>
                    <input class="form-control" type="file" name="profile" style="width: 200px;" required />
                </center>
            </div>

            <center>
                <input type="submit" name="submit1" class="btn btn-outline-primary" />
            </center>
        </form>



        <div style="background-color:blue;margin-left:60px;margin-right:60px;">
            <center>
                <label for="formFile" class="form-label" style="color:white;">Other Images</label>
            </center>
        </div>

        <div class="row">
            <div class="col">
                <form name="upload1" method="post" action="changeimages1.php" enctype="multipart/form-data" style="margin: 50px;">

                    <?php
                    echo $e;
                    ?>

                    <div class="mb-4">
                        <center>

                            <?php

                            $fetchimage = "SELECT * FROM photos where cid = $id";
                            $fetchimageresult = mysqli_query($connection, $fetchimage);
                            while ($fetchimageresultdata = mysqli_fetch_assoc($fetchimageresult)) {
                                $name = $fetchimageresultdata["pic1"];
                            ?>
                                <!-- <a href="image_upload/changeimagefront.php?id=<?= $id ?>"> -->
                                <img class="img-thumbnail rounded" src="images/<?php echo $name; ?>" style="width: 200px;height: 200px;" border="1" alt="Error" />
                                <!-- </a> -->
                            <?php
                            }
                            ?>
                            <input class="form-control" type="file" name="image1" style="width: 200px;" required />
                        </center>
                    </div>

                    <center>
                        <input type="submit" name="submit2" class="btn btn-outline-primary" />
                    </center>
                </form>
            </div>






            <div class="col">
                <form name="upload2" method="post" action="changeimages2.php" enctype="multipart/form-data" style="margin: 50px;">

                    <?php
                    echo $e;
                    ?>

                    <div class="mb-4">
                        <center>

                            <?php

                            $fetchimage = "SELECT * FROM photos where cid = $id";
                            $fetchimageresult = mysqli_query($connection, $fetchimage);
                            while ($fetchimageresultdata = mysqli_fetch_assoc($fetchimageresult)) {
                                $name = $fetchimageresultdata["pic2"];
                            ?>
                                <!-- <a href="image_upload/changeimagefront.php?id=<?= $id ?>"> -->
                                <img class="img-thumbnail rounded" src="images/<?php echo $name; ?>" style="width: 200px;height: 200px;" border="1" alt="Error" />
                                <!-- </a> -->
                            <?php
                            }
                            ?>
                            <input class="form-control" type="file" name="image2" style="width: 200px;" required />
                        </center>
                    </div>

                    <center>
                        <input type="submit" name="submit3" class="btn btn-outline-primary" />
                    </center>
                </form>
            </div>
        </div>




        <div class="row">
            <div class="col">
                <form name="upload3" method="post" action="changeimages3.php" enctype="multipart/form-data" style="margin: 50px;">

                    <?php
                    echo $e;
                    ?>

                    <div class="mb-4">
                        <center>

                            <?php

                            $fetchimage = "SELECT * FROM photos where cid = $id";
                            $fetchimageresult = mysqli_query($connection, $fetchimage);
                            while ($fetchimageresultdata = mysqli_fetch_assoc($fetchimageresult)) {
                                $name = $fetchimageresultdata["pic3"];
                            ?>
                                <!-- <a href="image_upload/changeimagefront.php?id=<?= $id ?>"> -->
                                <img class="img-thumbnail rounded" src="images/<?php echo $name; ?>" style="width: 200px;height: 200px;" border="1" alt="Error" />
                                <!-- </a> -->
                            <?php
                            }
                            ?>
                            <input class="form-control" type="file" name="image3" style="width: 200px;" required />
                        </center>
                    </div>

                    <center>
                        <input type="submit" name="submit4" class="btn btn-outline-primary" />
                    </center>
                </form>
            </div>






            <div class="col">
                <form name="upload4" method="post" action="changeimages4.php" enctype="multipart/form-data" style="margin: 50px;">

                    <?php
                    echo $e;
                    ?>

                    <div class="mb-4">
                        <center>

                            <?php

                            $fetchimage = "SELECT * FROM photos where cid = $id";
                            $fetchimageresult = mysqli_query($connection, $fetchimage);
                            while ($fetchimageresultdata = mysqli_fetch_assoc($fetchimageresult)) {
                                $name = $fetchimageresultdata["pic4"];
                            ?>
                                <!-- <a href="image_upload/changeimagefront.php?id=<?= $id ?>"> -->
                                <img class="img-thumbnail rounded" src="images/<?php echo $name; ?>" style="width: 200px;height: 200px;" border="1" alt="Error" />
                                <!-- </a> -->
                            <?php
                            }
                            ?>
                            <input class="form-control" type="file" name="image4" style="width: 200px;" required />
                        </center>
                    </div>

                    <center>
                        <input type="submit" name="submit5" class="btn btn-outline-primary" />
                    </center>
                </form>
            </div>
        </div>























        <br>
    </div><br>
</body>


</html>