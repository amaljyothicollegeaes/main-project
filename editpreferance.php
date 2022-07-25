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


    $agemin = $_POST['agemin'];
    $agemax = $_POST['agemax'];

    $heightmin = $_POST['heightmin'];
    $heightmax = $_POST['heightmax'];


    $religion = $_POST['religion'];
    $caste = $_POST['caste'];

    $district = $_POST['district'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $maritalStatus = $_POST['maritalStatus'];

    $education = $_POST['education'];

    $bodytype = $_POST['bodytype'];
    $finantialstatus = $_POST['finantialstatus'];
    $drink = $_POST['drink'];
    $smoke = $_POST['smoke'];
    $mothertongue = $_POST['mothertongue'];
    $color = $_POST['color'];

    $occupation = $_POST['occupation'];







    if ($heightmax != "") {

        $query = "UPDATE partnerdetails 
        SET 
        agemin = $agemin,
        agemax = $agemax,
        heightmin = $heightmin,
        heightmax = $heightmax,
        religion ='$religion',
        caste ='$caste',
        district ='$district',
        state ='$state',
        country ='$country',
        maritalstatus = '$maritalStatus',
        educationqualification ='$education',
        bodytype ='$bodytype',
        financialstatus ='$finantialstatus',
        drink ='$drink',
        smoke ='$smoke',
        mothertounge ='$mothertongue',
        color ='$color',
        occupation ='$occupation'
         WHERE cid = $id ";


        $result = mysqli_query($con, $query);

        if ($result) {
            $userlevelupdate = "UPDATE status set userlevel = 1 WHERE cid = '$id' limit 1";
            $userlevelresult = mysqli_query($con, $userlevelupdate);
        }

        header("Location: main.php?id=" . $id);
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
                        <!-- <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="font-weight:bold;">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="editprofile.php?id=<?= $id ?>">View and Edit Profiles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="main.php">Matches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="my_matches.php">My Matches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="viewprofile.php">View Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                            <br>
                        </ul> -->
                        <!-- <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="font-weight:bold;">

                            <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;">
                                <a style="color:blue" class="nav-link " aria-current="page" href="personaldetail.php?id=<?= $id ?>">
                                    <b>
                                        View and Edit Profile
                                    </b>
                                </a>
                            </li>

                            <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;">
                                <a style="color:blue" class="nav-link" href="main.php">
                                    <b>
                                        Matches
                                    </b>
                                </a>
                            </li>

                            <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;">
                                <a style="color:blue" class="nav-link" href="my_matches.php">
                                    <b>
                                        My Matches
                                    </b>
                                </a>
                            </li>

                            <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;">
                                <a style="color:blue" class="nav-link" href="requests.php?id=<?= $id ?>">
                                    <b>
                                        Requests
                                    </b>
                                </a>
                            </li>

                            <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;">
                                <a style="color:blue" class="nav-link" href="logout.php">
                                    <b>
                                        Logout
                                    </b>
                                </a>
                            </li>

                            <br>
                        </ul> -->

                        <?php
                        include("side_menu.php");
                        ?>

                        <form class="d-flex">

                        </form>
                    </div>
                </div>
        </div>
    </nav>




    <br><br><br><br><br>
    <center style="padding: 15px;box-shadow: 1px 1px 5px 5px lightblue;background:white;color:black;margin-right:5%;margin-left:9%;color:blue" class="container rounded">
        <h2>Edit Preference<h2>
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
                            <label for="exampleInputPassword1" class="form-label">Education</label><label style="color:red;"> *</label>
                            <!-- <input type="text" class="form-control" id="education" name="education" required/> -->
                            <select class="form-select col-4" id="education" name="education">
                                <option value="<?php echo $row["educationqualification"] ?>"><?php echo $row["educationqualification"] ?></option>
                                <option value="ANY">ANY</option>
                                <?php
                                $basic = "SELECT * FROM education ";
                                $basicresult = mysqli_query($con, $basic);
                                while ($rowbasic = mysqli_fetch_assoc($basicresult)) {
                                ?>
                                    <option value="<?php echo $rowbasic["e_value"] ?>"><?php echo $rowbasic["e_value"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Marital Status</label><label style="color:red;"> *</label>
                        <!-- <div class="container"> -->
                        <!-- <div class="row"> -->
                        <select class="form-select col-4" id="maritalStatus" name="maritalStatus">
                            <option value="<?php echo $row["maritalstatus"] ?>"><?php echo $row["maritalstatus"] ?></option>
                            <option value="ANY">ANY</option>
                            <option value="SINGLE">SINGLE</option>
                            <option value="DIVORCED">DIVORCED</option>
                        </select>
                        <!-- </div> -->
                        <!-- </div>         -->
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">District</label><label style="color:red;"> *</label>
                            <!-- <input type="text" class="form-control" id="district" name="district" required/> -->
                            <select class="form-select col-4" id="district" name="district">
                                <option value="<?php echo $row["district"] ?>"><?php echo $row["district"] ?></option>
                                <option value="ANY">ANY</option>
                                <?php
                                $basic = "SELECT * FROM district ";
                                $basicresult = mysqli_query($con, $basic);
                                while ($rowbasic = mysqli_fetch_assoc($basicresult)) {
                                ?>
                                    <option value="<?php echo $rowbasic["d_value"] ?>"><?php echo $rowbasic["d_value"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">State</label><label style="color:red;"> *</label>
                            <!-- <input type="text" class="form-control" id="state" name="state" required/> -->
                            <select class="form-select col-4" id="state" name="state">
                                <option value="<?php echo $row["state"] ?>"><?php echo $row["state"] ?></option>
                                <option value="ANY">ANY</option>
                                <?php
                                $basic = "SELECT * FROM state ";
                                $basicresult = mysqli_query($con, $basic);
                                while ($rowbasic = mysqli_fetch_assoc($basicresult)) {
                                ?>
                                    <option value="<?php echo $rowbasic["s_value"] ?>"><?php echo $rowbasic["s_value"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Country</label><label style="color:red;"> *</label>
                            <!-- <input type="text" class="form-control" id="country" name="country" required/> -->
                            <select class="form-select col-4" id="country" name="country">
                                <option value="<?php echo $row["country"] ?>"><?php echo $row["country"] ?></option>
                                <option value="ANY">ANY</option>
                                <option value="INDIA">INDIA</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Height min</label><label style="color:red;"> *</label>
                            <input type="number" class="form-control" id="heightmin" name="heightmin" min="100" value="<?php echo $row["heightmin"] ?>" required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Height max</label><label style="color:red;"> *</label>
                            <input type="number" class="form-control" id="heightmax" name="heightmax" min="100" value="<?php echo $row["heightmax"] ?>" required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Age min</label><label style="color:red;"> *</label>
                            <input type="number" class="form-control" id="agemin" name="agemin" min="18" value="<?php echo $row["agemin"] ?>" required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Age max</label><label style="color:red;"> *</label>
                            <input type="number" class="form-control" id="agemax" name="agemax" min="18" value="<?php echo $row["agemax"] ?>" required />
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Religion</label><label style="color:red;"> *</label>
                            <!-- <input type="text" class="form-control" id="religion" name="religion"  required/> -->
                            <select class="form-select col-4" id="religion" name="religion">
                                <option value="<?php echo $row["religion"] ?>"><?php echo $row["religion"] ?></option>
                                <option value="ANY">ANY</option>
                                <?php
                                $basic = "SELECT * FROM religion ";
                                $basicresult = mysqli_query($con, $basic);
                                while ($rowbasic = mysqli_fetch_assoc($basicresult)) {
                                ?>
                                    <option value="<?php echo $rowbasic["r_value"] ?>"><?php echo $rowbasic["r_value"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Caste</label><label style="color:red;"> *</label>
                            <!-- <input type="text" class="form-control" id="caste" name="caste"  required/> -->
                            <select class="form-select col-4" id="caste" name="caste">
                                <option value="<?php echo $row["caste"] ?>"><?php echo $row["caste"] ?></option>
                                <option value="ANY">ANY</option>
                                <?php
                                $basic = "SELECT * FROM caste ";
                                $basicresult = mysqli_query($con, $basic);
                                while ($rowbasic = mysqli_fetch_assoc($basicresult)) {
                                ?>
                                    <option value="<?php echo $rowbasic["c_value"] ?>"><?php echo $rowbasic["c_value"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Body Type</label><label style="color:red;"> *</label>
                            <!-- <div class="container"> -->
                            <!-- <div class="row"> -->
                            <select class="form-select col-4" aria-label="Default select example" id="bodytype" name="bodytype">
                                <option value="<?php echo $row["bodytype"] ?>"><?php echo $row["bodytype"] ?></option>
                                <option value="ANY">ANY</option>
                                <option value="Slim">Slim</option>
                                <option value="Normal">Normal</option>
                                <option value="Fat">Fat</option>
                            </select>
                            <!-- </div> -->
                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Drink</label><label style="color:red;"> *</label>
                            <!-- <div class="container">
                <div class="row"> -->
                            <select class="form-select col-4" aria-label="Default select example" id="drink" name="drink">
                                <option value="<?php echo $row["drink"] ?>"><?php echo $row["drink"] ?></option>
                                <option value="ANY">ANY</option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                            <!-- </div>
            </div> -->
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Smoke</label><label style="color:red;"> *</label>
                            <!-- <div class="container">
                <div class="row"> -->
                            <select class="form-select col-4" aria-label="Default select example" id="smoke" name="smoke">
                                <option value="<?php echo $row["smoke"] ?>"><?php echo $row["smoke"] ?></option>
                                <option value="ANY">ANY</option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                            <!-- </div>
            </div> -->
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Finantial Status</label><label style="color:red;"> *</label>
                            <!-- <div class="container">
                    <div class="row"> -->
                            <select class="form-select col-4" aria-label="Default select example" id="finantialstatus" name="finantialstatus">
                                <option value="<?php echo $row["financialstatus"] ?>"><?php echo $row["financialstatus"] ?></option>
                                <option value="ANY">ANY</option>
                                <option value="Poor">Poor</option>
                                <option value="Middle">Middle</option>
                                <option value="High">High</option>
                            </select>
                            <!-- </div>
                </div> -->
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Occupation</label><label style="color:red;"> *</label>
                            <!-- <input type="text" class="form-control" id="occupation" name="occupation" required/> -->
                            <select class="form-select col-4" aria-label="Default select example" id="occupation" name="occupation">
                                <option value="<?php echo $row["occupation"] ?>"><?php echo $row["occupation"] ?></option>
                                <option value="ANY">ANY</option>
                                <?php
                                $basic = "SELECT * FROM occupation ";
                                $basicresult = mysqli_query($con, $basic);
                                while ($rowbasic = mysqli_fetch_assoc($basicresult)) {
                                ?>
                                    <option value="<?php echo $rowbasic["o_value"] ?>"><?php echo $rowbasic["o_value"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Language</label><label style="color:red;"> *</label>
                            <!-- <input type="text" class="form-control" id="mothertongue" name="mothertongue" required/> -->
                            <select class="form-select col-4" aria-label="Default select example" id="mothertongue" name="mothertongue">
                                <option value="<?php echo $row["mothertounge"] ?>"><?php echo $row["mothertounge"] ?></option>
                                <option value="ANY">ANY</option>
                                <?php
                                $basic = "SELECT * FROM language ";
                                $basicresult = mysqli_query($con, $basic);
                                while ($rowbasic = mysqli_fetch_assoc($basicresult)) {
                                ?>
                                    <option value="<?php echo $rowbasic["l_value"] ?>"><?php echo $rowbasic["l_value"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Color</label><label style="color:red;"> *</label>
                            <div class="container">
                                <div class="row">
                                    <select class="form-select col-4" aria-label="Default select example" id="color" name="color">
                                        <option value="<?php echo $row["color"] ?>"><?php echo $row["color"] ?></option>
                                        <option value="ANY">ANY</option>
                                        <option value="Dark">Dark</option>
                                        <option value="Normal">Normal</option>
                                        <option value="White">White</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

























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