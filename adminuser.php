<?php
include("connection.php");
include("function.php");
include("menubar2.php");
?>
<html>

<head>
  <title>E Wed</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</head>

<body>
  <!-- <body style="background-color:#e8e8e8;"> -->
  <form class="border rounded border-info" style="margin-right:4%;margin-left:4%;background-color:#e2ebeb"">
    <br>
    <center>
      <h3 class=" bg-dark rounded" style="color:blue;margin-right:1%;margin-left:1%;padding:1%">VERIFIED USERS</h3>
    </center><br>
    <div class="container">
      <table id="example" class="table table-dark table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col" style="color:blue">ID</th>
            <th scope="col" style="color:blue">Image</th>
            <th scope="col" style="color:blue">User Name</th>
            <th scope="col" style="color:blue">Email</th>
            <th scope="col" style="color:blue">View Profile</th>
            <th scope="col" style="color:blue">Remove</th>
          </tr>
        </thead>

        <?php
        $table = "SELECT * from profiledata where cid in (SELECT cid from status where profilestatus = 1) ";
        $result = mysqli_query($con, $table);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {

        ?>
            <tr>
              <td>
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
                <!-- <?php echo $row["id"]; ?> -->
                <!-- <input type="button" value="view" id=<?php $row["id"]; ?> name="view" style="border-radius:5px;color:black"/> -->
                <a href="view.php?id=<?= $row["cid"] ?>" class="btn btn-outline-secondary" style="color:whitesmoke" ;>View</a>
              </td>
              <?php
              ?>
              <!-- <td> -->
              <!-- <?php echo $row["id"]; ?> -->
              <!-- <input type="button" value="confirm" id=<?php $row["id"]; ?> name="confirm" style="background:red;border-radius:5px;color:white"/> -->
              <!-- <a href="confirm.php?id=<?= $row["cid"] ?>" class="btn btn-outline-primary" style="color:whitesmoke";>Confirm</a> -->
              <!-- </td> -->
              <?php
              ?>
              <td>
                <!-- <?php echo $row["id"]; ?> -->
                <!-- <input type="button" value="remove" id=<?php $row["id"]; ?> name="remove" style="background:blue;border-radius:5px;color:white"/> -->
                <a href="blacklist.php?id=<?= $row["cid"] ?>" class="btn btn-outline-danger" style="color:whitesmoke" ;>Remove</a>
              </td>
            </tr>
        <?php

          }
        }
        ?>






































      </table>
    </div>
  </form>
</body>

</html>