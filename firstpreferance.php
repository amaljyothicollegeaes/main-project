<?php
session_start();
// include("connection.php");
include("function.php");
//include("menubar.php");

$id = $_SESSION['id'];

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

<body>
    <nav class="navbar navbar-light bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:blue;">
                <h2 style="margin-left:40px">E Wed</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="background:grey">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">E Wed</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="font-weight:bold;">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="http://localhost/ewed/profile.php">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/ewed/main.php">My Matches</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/ewed/viewprofile.php">View Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        <br>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>


























    <br><br><br><br><br><br>
    <center>Preferance Details</center><br><br>


    <form name="profile" method="POST">

        <?php


        ?>
        <div class="container">







            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Education</label><label style="color:red;"> *</label>
                        <!-- <input type="text" class="form-control" id="education" name="education" required/> -->
                        <select class="form-select col-4" id="education" name="education">
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
                        <input type="number" class="form-control" id="heightmin" name="heightmin" min="50" max="250" required />
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Height max</label><label style="color:red;"> *</label>
                        <input type="number" class="form-control" id="heightmax" name="heightmax" min="50" max="250" required />
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Age min</label><label style="color:red;"> *</label>
                        <input type="number" class="form-control" id="agemin" name="agemin" value="18" min="18" max="100" required />
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Age max</label><label style="color:red;"> *</label>
                        <input type="number" class="form-control" id="agemax" name="agemax" min="18" max="100" required />
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Religion</label><label style="color:red;"> *</label>
                        <!-- <input type="text" class="form-control" id="religion" name="religion"  required/> -->
                        <select class="form-select col-4" id="religion" name="religion">
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





















    </form>















</body>

</html>