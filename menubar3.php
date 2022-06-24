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
      <div style="color:blue;background:black;border:white;" class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h4 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard</h4>
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