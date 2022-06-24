<?php
session_start();
// include("connection.php");
include("function.php");
//include("menubar.php");

$id = $_SESSION['id'];
$ids = $_GET['id'];

if (!isset($_SESSION['id'])) {
    header("Location:login.php");
}

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



        $query3 = "UPDATE login set 
        email = '$mail',
        fname ='$fname',
        lname ='$lname' 
        where id = $ids ";

        // $query = "INSERT into profiledata (email,age,heigth,sex,religion,caste,subcaste,district,state,country,maritalstatus,profilecreatedby,educationqualification,fname,lname,bodytype,financialstatus,drink,smoke,mothertounge,color,weight,bloodtype,dob,occupation,occudiscription,annualincome,fathername,mothername,fatheroccupation,motheroccupation,noofbro,noofsis,marriedbro,marriedsis) values 
        // (`$mail`, $age, $height, '$sex', `$religion`, `$caste`, `$subcaste`, `$district`, `$state`, `$country`, $maritalStatus, 
        //`$profilecreatedby`, `$education`, `$fname`, `$lname`, `$bodytype`, `$finantialstatus`, `$drink`, `$smoke`, `$mothertongue`, `$color`, 
        //$weight, `$bloodtype`, `$dob`, `$occupation`, `$occudescription`, `$Annualincome`, `$fathername`, `$mothername`, `$fatheroccupation`, 
        //`$motheroccupation`, `$noofbro`, `$noofsis`, `$noofbromarried`, `$noofsismarried`) where cid = 43";
        $result = mysqli_query($con, $query);
        mysqli_query($con, $query3);
        if ($result) {
            header("Location: main.php");
        }
    } else {
        echo "please enter some validinformation";
    }
}





































?>
<html>

<head>
    <title>Edit Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</head>

<body>
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
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color:blue">E Wed</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="font-weight:bold;">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="editprofile.php?id=<?= $id ?>">View and Edit Profiles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="main.php">Matches</a>
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

                    </div>
                </div>
        </div>
    </nav>



    <div>
        <br><br><br><br>
        <center style="padding: 15px;box-shadow: 1px 1px 5px 5px lightblue;background:white;color:black;margin-right:5%;margin-left:9%;" class="container rounded">
            <h3 style="color:blue">Edit Profile</h3>
        </center><br>

        <?php
        if (isset($_GET['id'])) {
            $ids = $_GET['id'];
            // echo $ids;

            $table = "SELECT * from profiledata where cid = $ids";
            $result = mysqli_query($con, $table);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
        ?>

                    <form name="profile" method="POST" style="padding: 15px;box-shadow: 1px 1px 5px 5px lightblue;background:white;color:black;margin-right:5%;margin-left:9%;" class="container rounded">
                        <br>


                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">First Name</label><label style="color:red;"> *</label>
                                        <input type="text" value="<?php echo $row['fname'] ?>" class="form-control" id="fname" name="fname">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Last Name</label><label style="color:red;"> *</label>
                                        <input type="text" value="<?php echo $row['lname'] ?>" class="form-control" id="lname" name="lname">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="mail" name="mail" value="<?php echo $row['email'] ?>">
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Education</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="education" name="education" value="<?php echo $row['educationqualification'] ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Date Of Birth</label><label style="color:red;"> *</label>
                                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['dob'] ?>">
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
                                        <input type="text" class="form-control" id="district" name="district" value="<?php echo $row['district'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">State</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="state" name="state" value="<?php echo $row['states'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Country</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="country" name="country" value="<?php echo $row['country'] ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Height</label><label style="color:red;"> *</label>
                                        <input type="number" class="form-control" id="height" name="height" value="<?php echo $row['heigth'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Age</label><label style="color:red;"> *</label>
                                        <input type="number" class="form-control" id="age" name="age" value="<?php echo $row['age'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Gender</label><label style="color:red;"> *</label>
                                        <!-- <div class="container">
                                        <div class="row"> -->
                                        <select class="form-select col-4" aria-label="Default select example" id="gender" name="gender">
                                            <option value="<?php echo $row['sex'] ?>"><?php echo $row['sex'] ?></option>
                                            <option value="MALE">MALE</option>
                                            <option value="FEMALE">FEMALE</option>
                                        </select>
                                        <!-- </div>
                                    </div> -->
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Religion</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="religion" name="religion" value="<?php echo $row['religion'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Caste</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="caste" name="caste" value="<?php echo $row['caste'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Residence</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="subcaste" name="subcaste" value="<?php echo $row['subcaste'] ?>">
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
                                        <input type="text" class="form-control" id="weight" name="weight" value="<?php echo $row['weights'] ?>">
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
                                        <input type="text" class="form-control" id="occupation" name="occupation" value="<?php echo $row['occupation'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Occupation Description</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="occudescription" name="occudescription" value="<?php echo $row['occudiscription'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Mother Tongue</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="mothertongue" name="mothertongue" value="<?php echo $row['mothertounge'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Annual Income</label><label style="color:red;"> *</label>
                                        <input type="number" class="form-control" id="Annualincome" name="Annualincome" value="<?php echo $row['annualincome'] ?>">
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
                                            <!-- <option value="Self">Self</option>
                                                <option value="Parents">Parents</option> -->
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
                                        <input type="text" class="form-control" id="fathername" name="fathername" value="<?php echo $row['fathername'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Mother Name</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="mothername" name="mothername" value="<?php echo $row['mothername'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Father Occupation</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="fatheroccu" name="fatheroccu" value="<?php echo $row['fatheroccupation'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Mother Occupation</label><label style="color:red;"> *</label>
                                        <input type="text" class="form-control" id="motheroccu" name="motheroccu" value="<?php echo $row['motheroccupation'] ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">No OF Brothers</label><label style="color:red;"> *</label>
                                        <input type="number" class="form-control" id="noofbro" name="noofbro" value="<?php echo $row['noofbro'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">No of Sisters</label><label style="color:red;"> *</label>
                                        <input type="number" class="form-control" id="noofsis" name="noofsis" value="<?php echo $row['noofsis'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Married Brothers</label><label style="color:red;"> *</label>
                                        <input type="number" class="form-control" id="noofbromarried" name="noofbromarried" value="<?php echo $row['marriedbro'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Married Sisters</label><label style="color:red;"> *</label>
                                        <input type="number" class="form-control" id="noofsismarried" name="noofsismarried" value="<?php echo $row['marriedsis'] ?>">
                                    </div>
                                </div>
                            </div>






                            <div class="row">
                                <div class="col">
                                    <center><button type="submit" class="btn btn-primary" value="Login" onclick="profileentry()">Submit</button></center>
                                    <!-- name="update" -->
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

</html>