<?php
session_start();



$id = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
  header('Location:login.php');
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
          <h7 style="color:white;float:right;margin-left:75%">
            <i style="color:blue;" data-feather="user"></i>
            &nbsp;
            <?php

            echo $user_name_result_data['fname'];
            ?>

            <!-- <br> -->
            <?php
            echo $user_name_result_data['lname'];
            ?>
          </h7>
      <?php
        }
      }
      ?>



      <script>
        feather.replace()
      </script>




      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="background:grey">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div style="color:blue;background:black;border:white;" class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h4 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard</h4>
          <button style="border:1px solid blue;" type="button" class="btn-close text-reset btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <h2 style="margin-top:-15px;color:white">x</h2>
          </button>
        </div>
        <div class="offcanvas-body">

          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="font-weight:bold;">

            <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
              <a style="color:blue;margin-left:25%" class=" nav-link" aria-current="page" href="managing.php">
                <b>
                  <i style="color:blue" data-feather="eye"></i>
                  &nbsp;&nbsp;New Users
                </b>
              </a>
            </li>

            <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
              <a style="color:blue;margin-left:25%" class=" nav-link " aria-current=" page" href="managing_users.php">
                <b>
                  <i style="color:blue" data-feather="users"></i>&nbsp;&nbsp;Users
                </b>
              </a>
            </li>

            <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
              <a style="color:blue;margin-left:25%" class="nav-link " href="managing_payment_hold.php">
                <b>
                  <i style="color:blue" data-feather="dollar-sign"></i>&nbsp;&nbsp;Payment Hold
                </b>
              </a>
            </li>

            <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
              <a style="color:blue;margin-left:25%" class="nav-link " href="managing_blacklist.php">
                <b>
                  <i style="color:blue" data-feather="user-x"></i>&nbsp;&nbsp;Blacklisted Users
                </b>
              </a>
            </li>

            <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
              <a style="color:blue;margin-left:25%" class="nav-link " href="managing_reports.php">
                <b>
                  <i style="color:blue" data-feather="slash"></i>&nbsp;&nbsp;Reports
                </b>
              </a>
            </li>

            <li class="nav-item btn btn-outline-light" style="margin-right:-9%;border-radius: 40px 40px 40px 40px;text-align:left">
              <a style="color:blue;margin-left:25%" class="nav-link" href="logout.php">
                <b>
                  <i style="color:blue" data-feather="log-out"></i>&nbsp;&nbsp;Logout
                </b>
              </a>
            </li>
          </ul>

        </div>
      </div>
    </div>
  </nav>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <!-- <br>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>


    

    <br>
    <br>
    <?php echo $id; ?> -->

</body>

</html>