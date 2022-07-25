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
// "today" . $today;
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
$dt->modify("+$month month");
$dt->format("Y M D");
$s = $dt->format("Y M d");
$dt->format("Y M D");


$k = 0;
if ($dt_today <= $dt) {
} else {
  $k = 1;
}




if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $value = $_POST['value'];
  header("Location: search.php?id=" . $value);
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

      <a class="navbar-brand" href="#" style="color:blue;margin-left:20px">
        <h2 style=" margin-left: 20px;">E Wed</h2>
      </a>


      <form name="profile" method="POST">
        <div class="row" style="margin-top:10px;">
          <div class="col">
            <input class="form-control me-2" type="search" id="value" name="value" placeholder="Search By ID" style="width:200%" aria-label="Search" required />
          </div>
          <div class="col">
            <button class="btn btn-outline-success" type="submit" style="margin-left: 100%;">Search</button>
          </div>
        </div>
      </form>

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
          <img src="image_upload/images/<?php echo $name; ?>" style="width: 40px;height: 40px;border-radius:25px;border:2px solid white;margin: -25% ;" alt="Error" />

        <?php } ?>





        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="background:grey">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div style="color:blue;background:black;border:white;" class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h4 class="offcanvas-title" id="offcanvasNavbarLabel" Style="color: blue;">E Wed</h4>
            <button style="border:1px solid white;" type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
              <h2 style="margin-top:-15px;color:blue">
                <b>x</b>
              </h2>
            </button>
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
  </nav><br><br><br><br>

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
    <br>
    </center>
    <div class="row container rounded " style="margin-left: 100px">
      <div class="col  rounded border border-info" style="padding: 15px;background:white;color:black">
        <center>
          <b>
            Account Expires : </b>
          <h4 style="color:red"><?php echo $s ?></h4>

        </center>
      </div>





      <?php
      $preferancetable = "SELECT * from partnerdetails where cid = $id";
      $preferanceresult = mysqli_query($con, $preferancetable);
      while ($preferance_row = mysqli_fetch_assoc($preferanceresult)) {

        $pre_agemin = $preferance_row['agemin'];
        $pre_agemax = $preferance_row['agemax'];
        $pre_heightmin = $preferance_row['heightmin'];
        $pre_heightmax = $preferance_row['heightmax'];

        $pre_maritalstatus = $preferance_row['maritalstatus'];
        // echo $pre_maritalstatus;
        if ($pre_maritalstatus == 'ANY') {

          // echo $pre_maritalstatus;
          $pre_maritalstatus = '%';
        }

        $pre_religion = $preferance_row['religion'];
        // echo $pre_religion;
        if ($pre_religion == 'ANY') {

          // echo $pre_religion;
          $pre_religion = '%';
        }

        $pre_caste = $preferance_row['caste'];
        // echo $pre_caste;
        if ($pre_caste == 'ANY') {

          // echo $pre_caste;
          $pre_caste = '%';
        }

        $pre_mothertounge = $preferance_row['mothertounge'];
        if ($pre_mothertounge == 'ANY') {

          $values_table = "SELECT l_value from language";
          $values_result = mysqli_query($con, $values_table);
          while ($value_row = mysqli_fetch_array($values_result)) {
            $pre_mothertounge = $value_row["l_value"];
            // echo $pre_mothertounge;
            $pre_mothertounge = '%';
          }
        }


        $pre_educationqualification = $preferance_row['educationqualification'];
        if ($pre_educationqualification == 'ANY') {

          $values_table = "SELECT e_value from education";
          $values_result = mysqli_query($con, $values_table);
          while ($value_row = mysqli_fetch_array($values_result)) {
            $pre_educationqualification = $value_row["e_value"];
            // echo $pre_educationqualification;
            $pre_educationqualification = '%';
          }
        }

        $pre_occupation = $preferance_row['occupation'];
        // echo $pre_occupation;
        if ($pre_occupation == 'ANY') {

          $values_table = "SELECT o_value from occupation";
          $values_result = mysqli_query($con, $values_table);
          while ($value_row = mysqli_fetch_array($values_result)) {
            $pre_occupation = $value_row["o_value"];
            // echo $pre_occupation;
            $pre_occupation = '%';
          }
        }

        $pre_country = $preferance_row['country'];
        // echo $pre_country;
        if ($pre_country == 'ANY') {
          // echo $pre_country;
          $pre_country = '%';
        }

        $pre_state = $preferance_row['state'];
        // echo $pre_state;
        if ($pre_state == 'ANY') {

          $values_table = "SELECT s_value from state";
          $values_result = mysqli_query($con, $values_table);
          while ($value_row = mysqli_fetch_array($values_result)) {
            $pre_state = $value_row["s_value"];
            // echo $pre_state;
            $pre_state = '%';
          }
        }

        $pre_drink = $preferance_row['drink'];
        // echo $pre_drink;
        if ($pre_drink == 'ANY') {
          $pre_drink = "'YES','NO'";
          // echo $pre_drink;
          $pre_drink = '%';
        }

        $pre_smoke = $preferance_row['smoke'];
        // echo $pre_drink;
        if ($pre_smoke == 'ANY') {
          $pre_smoke = "'YES','NO'";
          // echo $pre_smoke;
          $pre_smoke = '%';
        }

        $pre_color = $preferance_row['color'];
        // echo $pre_color;
        if ($pre_color == 'ANY') {
          $pre_color = "'Dark','Normal','White'";
          // echo $pre_color;
          $pre_color = '%';
        }

        $pre_financialstatus = $preferance_row['financialstatus'];
        // echo $pre_financialstatus;
        if ($pre_financialstatus == 'ANY') {

          // echo $pre_financialstatus;
          $pre_financialstatus = '%';
        }

        $pre_bodytype = $preferance_row['bodytype'];
        // echo $pre_bodytype;
        if ($pre_bodytype == 'ANY') {

          // echo $pre_bodytype;
          $pre_bodytype = '%';
        }
      }


      $p_s = 0;
      $fetch_proof_status = "SELECT preferance_status FROM status where cid = $id";
      $fetch_proof_status_result = mysqli_query($con, $fetch_proof_status);
      $data_fetch_proof_status_result = mysqli_fetch_assoc($fetch_proof_status_result);
      if ($data_fetch_proof_status_result["preferance_status"] == 1) {
        $p_s = 1;
      }


      if ($p_s == 0) {



        $table = "SELECT * from profiledata where cid in (SELECT cid from status where profilestatus = 1) and sex != (SELECT sex from profiledata where cid = $id) 
  and age between $pre_agemin and $pre_agemax 
  and heigth between $pre_heightmin and $pre_heightmax 
  and maritalstatus like '$pre_maritalstatus' 
  and religion like '$pre_religion' 
  and caste like '$pre_caste' 
  and mothertounge like '$pre_mothertounge' 
  and educationqualification like '$pre_educationqualification'
  and occupation like '$pre_occupation'
  and country like '$pre_country'
  and states like '$pre_state' 
  and drink like '$pre_drink'
  and smoke like '$pre_smoke'
  and color like '$pre_color'
  and financialstatus like '$pre_financialstatus' 
  and bodytype like '$pre_bodytype' ";
      } else {
        $table = "SELECT * from profiledata where cid in (SELECT cid from status where profilestatus = 1) and sex != (SELECT sex from profiledata where cid = $id) 
  and age between $pre_agemin and $pre_agemax 
  and maritalstatus like '$pre_maritalstatus' 
  and religion like '$pre_religion' 
  and country like '$pre_country' ";
      }




      $result = mysqli_query($con, $table);
      if (mysqli_num_rows($result) > 0) {



      ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col  rounded border border-info" style="padding: 15px;background:white;color:black;">
          <center>
            <b>
              Matching Profile :
            </b>
            <h4 style="color:blue">
              <?php echo mysqli_num_rows($result); ?>
            </h4>
          </center>
        </div>
    </div>
    </center>
    <br>
    <?php




        while ($row = mysqli_fetch_assoc($result)) {
    ?>

      <div class=" container rounded" style="padding: 15px;box-shadow: 1px 1px 5px 5px lightblue;background:white;color:black">
        <div class="row">
          <div class="col">
            <?php
            $value = $row["cid"];
            $fetchimage = "SELECT * FROM photos where cid = $value";
            $fetchimageresult = mysqli_query($con, $fetchimage);
            while ($fetchimageresultdata = mysqli_fetch_assoc($fetchimageresult)) {
              $name = $fetchimageresultdata["profiles"];

            ?>
              <a href="viewprofile.php?id=<?= $row["cid"] ?>">
                <img class=" rounded" src="image_upload/images/<?php echo $name; ?>" style="width: 400px;height: 400px;margin-left: 30px;" alt="Error" />
              </a>
            <?php } ?>
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
      <br><?php

        }
      } else {
          ?>
    <center class="alert alert-info container">
      <h3>
        No Matching Profile !!!
      </h3>
    </center>
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