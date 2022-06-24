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
    $mail = $_POST['mail'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $sex = $_POST['gender'];
    $religion = $_POST['religion'];
    $caste = $_POST['caste'];
    $subcaste = $_POST['subcaste'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $maritalStatus = $_POST['maritalStatus'];
    $profilecreatedby = $_POST['profilecreatedby'];
    $education = $_POST['education'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $bodytype = $_POST['bodytype'];
    $finantialstatus = $_POST['finantialstatus'];
    $drink = $_POST['drink'];
    $smoke = $_POST['smoke'];
    $mothertongue = $_POST['mothertongue'];
    $color = $_POST['color'];
    $weight = $_POST['weight'];
    $bloodtype = $_POST['bloodtype'];
    $dob = $_POST['dob'];
    $occupation = $_POST['occupation'];
    $occudescription = $_POST['occudescription'];
    $Annualincome = $_POST['Annualincome'];
    $fathername = $_POST['fathername'];
    $mothername = $_POST['mothername'];
    $fatheroccupation = $_POST['fatheroccu'];
    $motheroccupation = $_POST['motheroccu'];
    $noofbro = $_POST['noofbro'];
    $noofsis = $_POST['noofsis'];
    $noofbromarried = $_POST['noofbromarried'];
    $noofsismarried = $_POST['noofsismarried'];






    if ($mail != "") {

        $query = "UPDATE profiledata 
        SET 
        email = '$mail',
        age = $age,
        heigth = $height,
        sex ='$sex',
        religion ='$religion',
        caste ='$caste',
        subcaste ='$subcaste',
        district ='$district',
        states ='$state',
        country ='$country',
        maritalstatus = '$maritalStatus',
        profilecreatedby ='$profilecreatedby',
        educationqualification ='$education',
        fname ='$fname',
        lname ='$lname',
        bodytype ='$bodytype',
        financialstatus ='$finantialstatus',
        drink ='$drink',
        smoke ='$smoke',
        mothertounge ='$mothertongue',
        color ='$color',
        weights =$weight,
        bloodtype ='$bloodtype',
        dob ='$dob',
        occupation ='$occupation',
        occudiscription ='$occudescription',
        annualincome ='$Annualincome',
        fathername ='$fathername',
        mothername ='$mothername',
        fatheroccupation ='$fatheroccupation',
        motheroccupation ='$motheroccupation',
        noofbro =$noofbro,
        noofsis =$noofsis,
        marriedbro =$noofbromarried,
        marriedsis =$noofsismarried
         WHERE cid = $id ";

        // $query = "INSERT into profiledata (email,age,heigth,sex,religion,caste,subcaste,district,state,country,maritalstatus,profilecreatedby,educationqualification,fname,lname,bodytype,financialstatus,drink,smoke,mothertounge,color,weight,bloodtype,dob,occupation,occudiscription,annualincome,fathername,mothername,fatheroccupation,motheroccupation,noofbro,noofsis,marriedbro,marriedsis) values 
        // (`$mail`, $age, $height, '$sex', `$religion`, `$caste`, `$subcaste`, `$district`, `$state`, `$country`, $maritalStatus, 
        //`$profilecreatedby`, `$education`, `$fname`, `$lname`, `$bodytype`, `$finantialstatus`, `$drink`, `$smoke`, `$mothertongue`, `$color`, 
        //$weight, `$bloodtype`, `$dob`, `$occupation`, `$occudescription`, `$Annualincome`, `$fathername`, `$mothername`, `$fatheroccupation`, 
        //`$motheroccupation`, `$noofbro`, `$noofsis`, `$noofbromarried`, `$noofsismarried`) where cid = 43";

        $result = mysqli_query($con, $query);

        if ($result) {
            $userlevelupdate = "UPDATE status set userlevel = 1 WHERE cid = '$id' limit 1";
            $userlevelresult = mysqli_query($con, $userlevelupdate);
        }

        header("Location: image_upload/img_profile.php?id=" . $id);
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
    <center>Profile Details</center><br><br>


    <form name="profile" method="POST">

        <?php
        $basic = "SELECT * FROM login WHERE id = $id";
        $basicresult = mysqli_query($con, $basic);
        while ($rowbasic = mysqli_fetch_assoc($basicresult)) {
        ?>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">First Name</label><label style="color:red;"> *</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $rowbasic["fname"] ?>" required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Last Name</label><label style="color:red;"> *</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $rowbasic["lname"] ?>" required />
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label><label style="color:red;"> *</label>
                            <input type="text" class="form-control" id="mail" name="mail" value="<?php echo $rowbasic["email"] ?>" required />
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                    </div>

                <?php } ?>

                <div class="col">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Education</label><label style="color:red;"> *</label>
                        <!-- <input type="text" class="form-control" id="education" name="education" required /> -->
                        <select class="form-select col-4" id="education" name="education">

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
                </div>


                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Date Of Birth</label><label style="color:red;"> *</label>
                            <input type="date" class="form-control" id="dob" name="dob" required />
                        </div>
                    </div>
                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Marital Status</label><label style="color:red;"> *</label>
                        <div class="container">
                            <div class="row">
                                <select class="form-select col-4" id="maritalStatus" name="maritalStatus">
                                    <option value="SINGLE">SINGLE</option>
                                    <option value="DIVORCED">DIVORCED</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">District</label><label style="color:red;"> *</label>
                            <!-- <input type="text" class="form-control" id="district" name="district" required /> -->
                            <select class="form-select col-4" id="district" name="district">
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
                            <!-- <input type="text" class="form-control" id="state" name="state" required /> -->
                            <select class="form-select col-4" id="state" name="state">
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
                            <!-- <input type="text" class="form-control" id="country" name="country" required /> -->
                            <select class="form-select col-4" id="country" name="country">

                                <option value="INDIA">INDIA</option>

                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Height</label><label style="color:red;"> *</label>
                            <input type="number" class="form-control" id="height" name="height" min="50" max="250" placeholder="Cm" required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Age</label><label style="color:red;"> *</label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="Cm" min="18" max="100" required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Gender</label><label style="color:red;"> *</label>
                            <!-- <div class="container"> -->
                            <!-- <div class="row"> -->
                            <select class="form-select col-4" aria-label="Default select example" id="gender" name="gender">
                                <option value="MALE">MALE</option>
                                <option value="FEMALE">FEMALE</option>
                            </select>
                            <!-- </div> -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Religion</label><label style="color:red;"> *</label>
                            <!-- <input type="text" class="form-control" id="religion" name="religion" required /> -->
                            <select class="form-select col-4" id="religion" name="religion">
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
                            <!-- <input type="text" class="form-control" id="caste" name="caste" required /> -->
                            <select class="form-select col-4" id="caste" name="caste">
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
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Residence </label><label style="color:red;"> *</label>
                            <input type="text" class="form-control" id="subcaste" name="subcaste" required />

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Body Type</label><label style="color:red;"> *</label>
                            <!-- <div class="container">
                                <div class="row"> -->
                            <select class="form-select col-4" aria-label="Default select example" id="bodytype" name="bodytype">
                                <option value="Slim">Slim</option>
                                <option value="Normal">Normal</option>
                                <option value="Fat">Fat</option>
                            </select>
                            <!-- </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Drink</label><label style="color:red;"> *</label>
                            <div class="container">
                                <div class="row">
                                    <select class="form-select col-4" aria-label="Default select example" id="drink" name="drink">
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Smoke</label><label style="color:red;"> *</label>
                            <div class="container">
                                <div class="row">
                                    <select class="form-select col-4" aria-label="Default select example" id="smoke" name="smoke">
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Weight</label><label style="color:red;"> *</label>
                            <input type="number" class="form-control" id="weight" name="weight" min="50" max="200" placeholder="In KG" required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Blood Group</label><label style="color:red;"> *</label>
                            <div class="container">
                                <div class="row">
                                    <select class="form-select col-4" aria-label="Default select example" id="bloodtype" name="bloodtype">
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Finantial Status</label><label style="color:red;"> *</label>
                            <div class="container">
                                <div class="row">
                                    <select class="form-select col-4" aria-label="Default select example" id="finantialstatus" name="finantialstatus">
                                        <option value="Poor">Poor</option>
                                        <option value="Middle">Middle</option>
                                        <option value="High">High</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Occupation</label><label style="color:red;"> *</label>
                            <!-- <input type="text" class="form-control" id="occupation" name="occupation" required /> -->
                            <select class="form-select col-4" id="occupation" name="occupation">
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
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Occupation Description</label><label style="color:red;"> *</label>
                            <input type="text" class="form-control" id="occudescription" name="occudescription" required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mother Tongue</label><label style="color:red;"> *</label>
                            <!-- <input type="text" class="form-control" id="mothertongue" name="mothertongue" required /> -->
                            <select class="form-select col-4" id="mothertongue" name="mothertongue">
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
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Annual Income</label><label style="color:red;"> *</label>
                            <input type="number" class="form-control" id="Annualincome" name="Annualincome" placeholder="Rs" required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Color</label><label style="color:red;"> *</label>
                            <div class="container">
                                <div class="row">
                                    <select class="form-select col-4" aria-label="Default select example" id="color" name="color">
                                        <option value="Dark">Dark</option>
                                        <option value="Normal">Normal</option>
                                        <option value="White">white</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Profile Created</label><label style="color:red;"> *</label>
                            <div class="container">
                                <div class="row">
                                    <select class="form-select col-4" aria-label="Default select example" id="profilecreatedby" name="profilecreatedby">
                                        <option value="Self">Self</option>
                                        <option value="Parents">Parents</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Father Name</label><label style="color:red;"> *</label>
                            <input type="text" class="form-control" id="fathername" name="fathername" required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mother Name</label><label style="color:red;"> *</label>
                            <input type="text" class="form-control" id="mothername" name="mothername" required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Father Occupation</label><label style="color:red;"> *</label>
                            <input type="text" class="form-control" id="fatheroccu" name="fatheroccu" required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mother Occupation</label><label style="color:red;"> *</label>
                            <input type="text" class="form-control" id="motheroccu" name="motheroccu" required />
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">No OF Brothers</label>
                            <input type="number" class="form-control" id="noofbro" name="noofbro" value="0" required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">No of Sisters</label>
                            <input type="number" class="form-control" id="noofsis" name="noofsis" value="0" required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Married Brothers</label>
                            <input type="number" class="form-control" id="noofbromarried" name="noofbromarried" value="0" required />
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Married Sisters</label>
                            <input type="number" class="form-control" id="noofsismarried" name="noofsismarried" value="0" required />
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