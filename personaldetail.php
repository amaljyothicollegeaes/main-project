<?php
session_start();
// include("connection.php");
include("function.php");
//include("menubar.php");

$id = $_SESSION['id'];
// $ids = $_GET['id'];
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

    <script src="https://unpkg.com/feather-icons"></script>

</head>



<body style="background-color:#e8eff4">

    <nav class=" navbar navbar-light bg-dark fixed-top">
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
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color: blue">E Wed</h5>
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
    <div class="container border border-info" style="padding: 15px;border-radius:5px;background-color:white">
        <center>
            <h3 style="color:blue">YOUR PROFILE</h3>
        </center>
    </div><br>
    <?php
    $table = "SELECT * from profiledata where cid in (SELECT cid from status where profilestatus = 1) ";
    $result = mysqli_query($con, $table);
    while ($row = mysqli_fetch_assoc($result)) {
    }
    ?>







    <?php
    if (isset($_SESSION['id'])) {
        $ids = $_SESSION['id'];
        // echo $ids;

        $table = "SELECT * from profiledata where cid = $ids";
        $result = mysqli_query($con, $table);
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
    ?>

                <section class="">

                    <form name="profile" method="POST">

                        <div class="container border border-info" style="padding: 15px;border-radius:5px;background-color:white">

                            <div class="row">
                                <label for="exampleInputEmail1" class="form-label" style="color:white;background-color:blue;margin-top: 10px;">
                                    <h4>
                                        <center>PRIMARY INFORMATION</center>
                                    </h4>
                                </label><br><br>
                                <div class="col">
                                    <?php

                                    $fetchimage = "SELECT * FROM photos where cid = $ids";
                                    $fetchimageresult = mysqli_query($con, $fetchimage);
                                    while ($fetchimageresultdata = mysqli_fetch_assoc($fetchimageresult)) {
                                        $name = $fetchimageresultdata["profiles"];
                                    ?>
                                        <a href="image_upload/changeimagefront.php?id=<?= $ids ?>">
                                            <img class="img rounded" src="image_upload/images/<?php echo $name; ?>" style="width: 100px;height: 100px;margin-left: 30px;" alt="Error" />

                                        </a>
                                        <i style="color:black;margin-left:-27px;margin-top:78px;" data-feather="edit"></i>
                                        <script>
                                            feather.replace()
                                        </script>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <a href="editprofile.php?id=<?= $ids ?>" class="btn btn-outline-primary" style="color:black;float:right">Edit</a>

                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">User ID :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['cid'] ?></label>
                                        <!-- <label for="exampleInputEmail1" class="form-label" ><?php echo $row['lname'] ?></label> -->
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Name :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['fname'] ?></label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['lname'] ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Gender :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['sex'] ?></label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Age & Dob :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['age'] ?>,</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['dob'] ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Body Type :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['bodytype'] ?></label>
                                        <!-- <label for="exampleInputEmail1" class="form-label" ><?php echo $row['lname'] ?></label> -->
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Marital Status :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['maritalstatus'] ?></label>
                                        <!-- <label for="exampleInputEmail1" class="form-label" ><?php echo $row['lname'] ?></label> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- <label for="exampleInputEmail1" class="form-label" style="color:red;"><center>Primary Information</center></label> -->
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Height :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['id'] ?></label>
                                        <!-- <label for="exampleInputEmail1" class="form-label" ><?php echo $row['height'] ?></label> -->
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Weight :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['weights'] ?></label>
                                        <!-- <label for="exampleInputEmail1" class="form-label" ><?php echo $row['lname'] ?></label> -->
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Blood Group :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['bloodtype'] ?></label>
                                        <!-- <label for="exampleInputEmail1" class="form-label" ><?php echo $row['lname'] ?></label> -->
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Family Status :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['financialstatus'] ?></label>
                                        <!-- <label for="exampleInputEmail1" class="form-label" ><?php echo $row['lname'] ?></label> -->
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Mother Tongue :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['mothertounge'] ?></label>
                                        <!-- <label for="exampleInputEmail1" class="form-label" ><?php echo $row['lname'] ?></label> -->
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Color :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['color'] ?></label>
                                        <!-- <label for="exampleInputEmail1" class="form-label" ><?php echo $row['lname'] ?></label> -->
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Email :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['email'] ?></label>
                                        <!-- <label for="exampleInputEmail1" class="form-label" ><?php echo $row['lname'] ?></label> -->
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Profile Created By :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['profilecreatedby'] ?></label>
                                        <!-- <label for="exampleInputEmail1" class="form-label" ><?php echo $row['lname'] ?></label> -->
                                    </div>
                                </div>
                            </div>



















                        </div>
                        <br>





                        <div class="container border border-info" style="padding: 15px;border-radius:5px;background-color:white">
                            <div class="row">
                                <label for="exampleInputEmail1" class="form-label" style="color:white;background-color:blue;margin-top: 10px;">
                                    <h4>
                                        <center>Images</center>
                                    </h4>
                                </label><br><br>
                                <!-- <div class="col"> -->
                                <?php

                                $fetchimage = "SELECT * FROM photos where cid = $ids";
                                $fetchimageresult = mysqli_query($con, $fetchimage);
                                while ($fetchimageresultdata = mysqli_fetch_assoc($fetchimageresult)) {
                                    $name = $fetchimageresultdata["profiles"];
                                ?>
                                    <!-- <img class="rounded" src="image_upload/images/<?php echo $name; ?>" style="width: 100px;height: 100px;margin-left: 30px;" alt="Error" /> -->
                                    <!-- <div class="row"> -->
                                    <div class="col">
                                        <center>
                                            <img class="rounded" width="400px" height="400px" src="image_upload/images/<?php echo $name; ?>" alt="" id="ProductImg">
                                        </center>
                                    </div>
                            </div>
                            <center>
                                <div class="row">
                                    <div class="col">
                                        <?php
                                        if ($name != "") {
                                        ?><br>
                                            <div class=" small-img-row">
                                                <div class="small-img-col">
                                                    <img style="border-radius:5px" width="100px" height="100px" src="image_upload/images/<?php echo $name; ?>" alt="" class="small-img">
                                                    <img style="border-radius:5px" width="100px" height="100px" src="image_upload/images/<?php echo $fetchimageresultdata["pic1"]; ?>" alt="" class="small-img">
                                                    <img style="border-radius:5px" width="100px" height="100px" src="image_upload/images/<?php echo $fetchimageresultdata["pic2"]; ?>" alt="" class="small-img">
                                                    <img style="border-radius:5px" width="100px" height="100px" src="image_upload/images/<?php echo $fetchimageresultdata["pic3"]; ?>" alt="" class="small-img">
                                                    <img style="border-radius:5px" width="100px" height="100px" src="image_upload/images/<?php echo $fetchimageresultdata["pic4"]; ?>" alt="" class="small-img">
                                                </div>
                                                <script>
                                                    var ProductImg = document.getElementById("ProductImg");
                                                    var SmallImg = document.getElementsByClassName("small-img");
                                                    SmallImg[0].onclick = function() {
                                                        ProductImg.src = SmallImg[0].src;
                                                    }
                                                    SmallImg[1].onclick = function() {
                                                        ProductImg.src = SmallImg[1].src;
                                                    }
                                                    SmallImg[2].onclick = function() {
                                                        ProductImg.src = SmallImg[2].src;
                                                    }
                                                    SmallImg[3].onclick = function() {
                                                        ProductImg.src = SmallImg[3].src;
                                                    }
                                                    SmallImg[4].onclick = function() {
                                                        ProductImg.src = SmallImg[4].src;
                                                    }
                                                </script>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <!-- </div> -->
                                    <?php
                                }
                                    ?>
                                    </div>


                                    <br>
                                </div>
                            </center>
                        </div>

                        <br>




                        <div class="container border border-info" style="padding: 15px;border-radius:5px;background-color:white">
                            <div class=" row">
                                <br><br>
                                <label for="exampleInputEmail1" class="form-label" style="color:white;background-color:blue;margin-top: 10px;">
                                    <center>
                                        <h4>FAMILY DETAILS</h4>
                                    </center>
                                </label>
                                <br><br>
                                <div class="col">
                                    <br>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Father Name :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['fathername'] ?></label>

                                    </div>
                                </div>
                                <div class="col"><br>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Mother Name :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['mothername'] ?></label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Father Occupation :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['fatheroccupation'] ?></label>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Mother Occupation :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['motheroccupation'] ?></label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">No Of Brothers :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['noofbro'] ?></label>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">No Of Sisters :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['noofsis'] ?></label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Married Brothers :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['marriedbro'] ?></label>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Married Sisters :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['marriedsis'] ?></label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>




                        <div class="container border border-info" style="padding: 15px;border-radius:5px;background-color:white">
                            <div class=" row">
                                <br><br>
                                <label for="exampleInputEmail1" class="form-label" style="color:white;background-color:blue;margin-top: 10px;">
                                    <center>
                                        <h4>RELIGIOUS AND SOCIAL BACKGROUND</h4>
                                    </center>
                                </label>
                                <br><br>
                                <div class="col">
                                    <br>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Religion :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['religion'] ?></label>

                                    </div>
                                </div>
                                <div class="col"><br>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Caste :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['caste'] ?></label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Nationality :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['country'] ?></label>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">State :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['states'] ?></label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">District :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['district'] ?></label>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Residence :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['subcaste'] ?></label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>



                        <div class="container border border-info" style="padding: 15px;border-radius:5px;background-color:white">
                            <div class=" row">
                                <br><br>
                                <label for="exampleInputEmail1" class="form-label" style="color:white;background-color:blue;margin-top: 10px;">
                                    <h4>
                                        <center>EDUCATION AND CAREER DETAILS</center>
                                    </h4>
                                </label>
                                <br><br>
                                <div class="col"><br>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Education :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['educationqualification'] ?></label>

                                    </div>
                                </div>
                                <div class="col"><br>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Occupation :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['occupation'] ?></label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Occupation Description :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['occudiscription'] ?></label>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Annual Income :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['annualincome'] ?></label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Drink :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['drink'] ?></label>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Smoke :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['smoke'] ?></label>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }




                $table = "SELECT * from partnerdetails where cid = $ids";
                $result = mysqli_query($con, $table);


                while ($row = mysqli_fetch_assoc($result)) {


                    ?>

                        <br>
                        <div class="container border border-info" style="padding: 15px;border-radius:5px;background-color:white">
                            <div class=" row">
                                <br><br>
                                <label for="exampleInputEmail1" class="form-label" style="color:white;background-color:blue;margin-top: 10px;">
                                    <center>
                                        <h4>PREFERENCES</h4>
                                    </center>
                                </label>
                                <br><br>
                                <div class="col"><br>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Age Preferred :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['agemin'] ?> to</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['agemax'] ?>.</label>

                                    </div>
                                </div>
                                <div class="col"><br>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Height Preferred :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['heightmin'] ?> to</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['heightmax'] ?>.</label>
                                        <a href="editpreferance.php?id=<?= $ids ?>" class="btn btn-outline-primary" style="color:black;float:right">Edit</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Place Preferred :</label>
                                        <label for="exampleInputEmail1" class="form-label">District-<?php echo $row['district'] ?>,</label>
                                        <label for="exampleInputEmail1" class="form-label">State-<?php echo $row['state'] ?>,</label>
                                        <label for="exampleInputEmail1" class="form-label">Nationality-<?php echo $row['country'] ?>.</label>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Qualification Preferred :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['educationqualification'] ?></label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Occupation Preferred :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['occupation'] ?></label>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Marital Status:</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['maritalstatus'] ?></label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Religion Preferred :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['religion'] ?></label>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Caste Preferred:</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['caste'] ?></label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Language Preferred :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['mothertounge'] ?></label>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Financial Status:</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['financialstatus'] ?></label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Drink Preferred :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['drink'] ?></label>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Smoke Status:</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['smoke'] ?></label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">BodyType Preferred :</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['bodytype'] ?></label>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" style="color:blue;margin-left: 20px;">Color:</label>
                                        <label for="exampleInputEmail1" class="form-label"><?php echo $row['color'] ?></label>

                                    </div>
                                </div>
                            </div>







                        </div>
                    </form>

                </section>


    <?php









































                }
            }
        }
        // echo "welcome";
    ?>
















    <br>
</body>

</html>