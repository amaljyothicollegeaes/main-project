<?php
session_start();
// include("connection.php");
include("function.php");
//include("menubar.php");

$id = $_SESSION['id'];
$ids = $_GET['id'];

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ewed";
$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);



// if(isset($_POST['update']))
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $mail = $_POST['mail'];
?>
    <script>
        alert("good togo");
        // prompt("Please enter","Please");
    </script>
    <?php
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



    echo $mail;


    if ($mail != "") {
    ?>
        <script>
            alert("good togo");
        </script>
<?php

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
         WHERE cid = $ids ";





        $result = mysqli_query($con, $query);
        if ($result) {
            header("Location: managing_users.php");
        }
    } else {
        echo "please enter some validinformation";
    }
}





































?>
<html>

<head>
    <title>E Wed Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>


</head>

<body>
    <nav class="navbar navbar-light bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:blue;margin-left:20px">
                <h2>E Wed</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="background:grey">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="color:blue;background:black;">
                <div class="offcanvas-header">
                    <h4 class="offcanvas-title" id="offcanvasNavbarLabel" style="color:blue">E Wed</h4>
                    <button style="border:1px solid blue;" type="button" class="btn-close text-reset btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                        <h2 style="margin-top:-15px;color:white">x</h2>
                    </button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="font-weight:bold;">
                        <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;">
                            <a style="color:blue" class=" nav-link" aria-current="page" href="managing.php">
                                <i style="color:blue" data-feather="eye"></i>&nbsp;&nbsp;Verify Users
                            </a>
                        </li>
                        <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;">
                            <a style="color:blue;" class=" nav-link " aria-current=" page" href="managing_users.php">
                                <i style="color:blue" data-feather="info"></i>&nbsp;&nbsp;Verified Users
                            </a>
                        </li>
                        <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;">
                            <a style="color:blue" class="nav-link " href="managing_blacklist.php">
                                <i style="color:blue" data-feather="shield-off"></i>&nbsp;&nbsp;Blacklisted Users
                            </a>
                        </li>
                        <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;">
                            <a style="color:blue" class="nav-link" href="logout.php">
                                <i style="color:blue" data-feather="log-out"></i>&nbsp;&nbsp;Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <br><br><br><br>
    <div class="border border-2 border-dark rounded " style="margin-right:4%;margin-left:4%;background-color:ghostwhite">
        <br>
        <center class="bg-dark rounded" style="color:blue;margin-right:1%;margin-left:1%;padding:1%">
            <h3 style=" color:blue">Edit Profile</h3>
        </center><br><br>

        <?php
        if (isset($_GET['id'])) {
            $ids = $_GET['id'];
            // echo $ids;

            $table = "SELECT * from profiledata where cid = $ids";
            $result = mysqli_query($con, $table);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
        ?>

                    <form name="profile" method="POST">

                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">First Name</label><label style="color:red;"> *</label>
                                        <input type="text" value="<?php echo $row['fname'] ?>" class="form-control" id="fname" name="fname" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Last Name</label><label style="color:red;"> *</label>
                                        <input type="text" value="<?php echo $row['lname'] ?>" class="form-control" id="lname" name="lname" required />
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="mail" name="mail" value="<?php echo $row['email'] ?>" required />
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Education</label><label style="color:red;"> *</label>
                                        <!-- <input type="text" class="form-control" id="education" name="education" value="<?php echo $row['educationqualification'] ?>"> -->
                                        <select class="form-select col-4" id="education" name="education">
                                            <option value="<?php echo $row["educationqualification"] ?>"><?php echo $row["educationqualification"] ?></option>
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
                                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['dob'] ?>" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="exampleInputPassword1" class="form-label">Marital Status</label><label style="color:red;"> *</label>
                                    <!-- <div class="container">
                                        <div class="row"> -->
                                    <select class="form-select col-4" id="maritalStatus" name="maritalStatus">
                                        <option value="<?php echo $row['maritalstatus'] ?>"> <?php echo $row['maritalstatus'] ?> </option>

                                        <option value="SINGLE">SINGLE</option>
                                        <option value="DIVORCED">DIVORCED</option>
                                    </select>
                                    <!-- </div>
                                    </div> -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">District</label><label style="color:red;"> *</label>
                                        <!-- <input type="text" class="form-control" id="district" name="district" value="<?php echo $row['district'] ?>"> -->
                                        <select class="form-select col-4" id="district" name="district">
                                            <option value="<?php echo $row["district"] ?>"><?php echo $row["district"] ?></option>
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
                                        <!-- <input type="text" class="form-control" id="state" name="state" value="<?php echo $row['states'] ?>"> -->
                                        <select class="form-select col-4" id="state" name="state">
                                            <option value="<?php echo $row["states"] ?>"><?php echo $row["states"] ?></option>
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
                                        <!-- <input type="text" class="form-control" id="country" name="country" value="<?php echo $row['country'] ?>"> -->
                                        <select class="form-select col-4" id="country" name="country">
                                            <option value="<?php echo $row["country"] ?>"><?php echo $row["country"] ?></option>
                                            <!-- <option value="ANY">ANY</option> -->
                                            <option value="India">India</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Height</label><label style="color:red;"> *</label>
                                        <input type="number" class="form-control" id="height" name="height" min="100" max="250" value="<?php echo $row['heigth'] ?>" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Age</label><label style="color:red;"> *</label>
                                        <input type="number" class="form-control" id="age" name="age" min="18" max="100" value="<?php echo $row['age'] ?>" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Gender</label><label style="color:red;"> *</label>
                                        <!-- <div class="container"> -->
                                        <!-- <div class="row"> -->
                                        <select class="form-select col-4" aria-label="Default select example" id="gender" name="gender">
                                            <option value="<?php echo $row['sex'] ?>"><?php echo $row['sex'] ?></option>
                                            <option value="ANY">ANY</option>
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
                                        <!-- <input type="text" class="form-control" id="religion" name="religion" value="<?php echo $row['religion'] ?>"> -->
                                        <select class="form-select col-4" id="religion" name="religion">
                                            <option value="<?php echo $row["religion"] ?>"><?php echo $row["religion"] ?></option>
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
                                        <!-- <input type="text" class="form-control" id="caste" name="caste" value="<?php echo $row['caste'] ?>"> -->
                                        <select class="form-select col-4" id="caste" name="caste">
                                            <option value="<?php echo $row["caste"] ?>"><?php echo $row["caste"] ?></option>
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
                                        <label for="exampleInputPassword1" class="form-label">Residence</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" minlength="3" id="subcaste" name="subcaste" value="<?php echo $row['subcaste'] ?>" required />
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
                                            <option value="<?php echo $row['bodytype'] ?>"> <?php echo $row['bodytype'] ?> </option>
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
                                        <!-- <div class="container">
                                    <div class="row"> -->
                                        <select class="form-select col-4" aria-label="Default select example" id="drink" name="drink">
                                            <option value="<?php echo $row['drink'] ?>"> <?php echo $row['drink'] ?> </option>
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
                                            <option value="<?php echo $row['smoke'] ?>"> <?php echo $row['smoke'] ?> </option>
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
                                        <label for="exampleInputEmail1" class="form-label">Weight</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="weight" name="weight" min="50" max="250" value="<?php echo $row['weights'] ?>" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Blood Group</label><label style="color:red;"> *</label>
                                        <!-- <div class="container">
                                    <div class="row"> -->
                                        <select class="form-select col-4" aria-label="Default select example" id="bloodtype" name="bloodtype">
                                            <option value="<?php echo $row['bloodtype'] ?>"> <?php echo $row['bloodtype'] ?> </option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                        <!-- </div>
                                </div> -->
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Finantial Status</label><label style="color:red;"> *</label>
                                        <!-- <div class="container">
                                    <div class="row"> -->
                                        <select class="form-select col-4" aria-label="Default select example" id="finantialstatus" name="finantialstatus">
                                            <option value="<?php echo $row['financialstatus'] ?>"> <?php echo $row['financialstatus'] ?> </option>
                                            <option value="Poor">Poor</option>
                                            <option value="Middle">Middle</option>
                                            <option value="High">High</option>
                                        </select>
                                        <!-- </div>
                                </div> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Occupation</label><label style="color:red;"> *</label>
                                        <!-- <input type="text" class="form-control" id="occupation" name="occupation" value="<?php echo $row['occupation'] ?>"> -->
                                        <select class="form-select col-4" id="occupation" name="occupation">
                                            <option value="<?php echo $row["occupation"] ?>"><?php echo $row["occupation"] ?></option>
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
                                        <input type="text" class="form-control" id="occudescription" name="occudescription" value="<?php echo $row['occudiscription'] ?>" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Mother Tongue</label><label style="color:red;"> *</label>
                                        <!-- <input type="text" class="form-control" id="mothertongue" name="mothertongue" value="<?php echo $row['mothertounge'] ?>"> -->
                                        <select class="form-select col-4" id="mothertongue" name="mothertongue">
                                            <option value="<?php echo $row["mothertounge"] ?>"><?php echo $row["mothertounge"] ?></option>
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
                                        <input type="number" class="form-control" id="Annualincome" name="Annualincome" value="<?php echo $row['annualincome'] ?>" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Color</label><label style="color:red;"> *</label>
                                        <!-- <div class="container">
                                    <div class="row"> -->
                                        <select class="form-select col-4" aria-label="Default select example" id="color" name="color">
                                            <option value="<?php echo $row['color'] ?>"> <?php echo $row['color'] ?> </option>
                                            <option value="Dark">Dark</option>
                                            <option value="Normal">Normal</option>
                                            <option value="White">White</option>
                                        </select>
                                        <!-- </div>
                                </div> -->
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Profile Created</label><label style="color:red;"> *</label>
                                        <!-- <div class="container">
                                    <div class="row"> -->
                                        <select class="form-select col-4" aria-label="Default select example" id="profilecreatedby" name="profilecreatedby">
                                            <option value="<?php echo $row['profilecreatedby'] ?>"><?php echo $row['profilecreatedby'] ?></option>
                                            <option value="Self">Self</option>
                                            <option value="Parents">Parents</option>
                                        </select>
                                        <!-- </div>
                                </div> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Father Name</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="fathername" name="fathername" value="<?php echo $row['fathername'] ?>" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Mother Name</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="mothername" name="mothername" value="<?php echo $row['mothername'] ?>" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Father Occupation</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="fatheroccu" name="fatheroccu" value="<?php echo $row['fatheroccupation'] ?>" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Mother Occupation</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="motheroccu" name="motheroccu" value="<?php echo $row['motheroccupation'] ?>" required />
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">No OF Brothers</label>
                                        <input type="number" class="form-control" id="noofbro" name="noofbro" value="<?php echo $row['noofbro'] ?>" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">No of Sisters</label>
                                        <input type="number" class="form-control" id="noofsis" name="noofsis" value="<?php echo $row['noofsis'] ?>" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Married Brothers</label>
                                        <input type="number" class="form-control" id="noofbromarried" name="noofbromarried" value="<?php echo $row['marriedbro'] ?>" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Married Sisters</label>
                                        <input type="number" class="form-control" id="noofsismarried" name="noofsismarried" value="<?php echo $row['marriedsis'] ?>" required />
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


        <?php
                }
            }
        }

        ?>

    </div>
    <br>
</body>
<script>
    feather.replace()
</script>

</html>