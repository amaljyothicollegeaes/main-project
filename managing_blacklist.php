<?php
include("connection.php");
include("function.php");
include("menubar3.php");
?>
<html>

<head>
  <title>E Wed</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>

</head>

<body style="background-color:#e8eff4">
  <!-- <body style="background-color:#e8e8e8;"> -->
  <form class="border border-2 border-info rounded " style="margin-right:4%;margin-left:4%;background-color:white">
    <br>
    <center>
      <h3 class="rounded" style="color:white;margin-right:1%;margin-left:1%;padding:1%;background-color:blue">BLACKLISTED USERS</h3>
    </center><br><br>
    <div class="container">
      <table id="example" class="table table-dark table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">View Profile</th>
            <th scope="col">Confirm</th>
            <!-- <th scope="col">Remove</th> -->
          </tr>
        </thead>

        <?php
        $table = "SELECT * from profiledata where cid in (SELECT cid from status where profilestatus = 4) ";
        $result = mysqli_query($con, $table);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {

        ?>
            <tr>
              <td style="color:blue">
                <?php echo $row["cid"]; ?>
              </td>



              <?php

              $cid = $row["cid"];
              $table_cid = "SELECT * from photos where cid = $cid";
              $result_cid = mysqli_query($con, $table_cid);
              $data_cid = mysqli_fetch_assoc($result_cid);
              ?>
              <td>
                <center>
                  <?php $profile = $data_cid["profiles"]; ?>
                  <img src="image_upload/images/<?php echo $profile; ?>" style="width: 40px;height: 40px;border-radius:20px;border:2px solid blue;" alt="No_Image" />
                </center>
              </td>







              <?php
              ?>
              <td>
                <?php echo $row["fname"] . " " . $row["lname"]; ?>
              </td>
              <?php
              ?>
              <td>
                <?php echo $row["email"]; ?>
              </td>
              <?php
              ?>
              <td>

                <a href="managing_view.php?id=<?= $row["cid"] ?>" class="btn btn-outline-secondary" style="color:whitesmoke" ;>View</a>
              </td>
              <?php
              ?>
              <td>

                <a href="managing_confirm.php?id=<?= $row["cid"] ?>" class="btn btn-outline-primary" style="color:whitesmoke" ;>Confirm</a>
              </td>
              <?php
              ?>

            </tr>
        <?php

          }
        }
        ?>

      </table>
    </div>
  </form>
  <script>
    feather.replace()
  </script>
</body>

</html>