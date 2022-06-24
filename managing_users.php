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

<body>
  <!-- <body style="background-color:#e8e8e8;"> -->
  <form class="border border-2 border-dark rounded " style="margin-right:4%;margin-left:4%;background-color:whitesmoke">
    <br>
    <center>
      <h3 class="bg-dark rounded" style="color:blue;margin-right:1%;margin-left:1%;padding:1%">VERIFIED USERS</h3>
    </center><br>
    <div class="container">
      <table id="example" class="table table-dark table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col" style="color:whitesmoke">ID</th>
            <th scope="col" style="color:whitesmoke">User Name</th>
            <th scope="col" style="color:whitesmoke">Email</th>
            <th scope="col" style="color:whitesmoke">View Profile</th>
            <!-- <th scope="col">Confirm</th> -->
            <th scope="col" style="color:whitesmoke">Remove</th>
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

              <?php
              ?>
              <td>
                <a href="managing_blacklist_remove.php?id=<?= $row["cid"] ?>" class="btn btn-outline-danger" style="color:whitesmoke" ;>Remove</a>
              </td>
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