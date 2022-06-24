<?php
include("connection.php");
include("function.php");
include("menubar3.php");
$id = $_SESSION['id'];
// echo $id;
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

<!-- <body style="background-color:#e8e8e8;"> -->

<body>
    <form class="border border-2 border-dark rounded" style="margin-right:4%;margin-left:4%;background-color:ghostwhite">
        <br>

        <center>
            <h3 class="bg-dark rounded" style="color:blue;margin-right:1%;margin-left:1%;padding:1%">
                <!-- <i style="color:blue" data-feather="log-out">
                </i> -->
                NEW USERS
            </h3>
        </center><br><br>

        <div class="container">
            <table id="example" class="table table-dark table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <!-- <th scope="col">Status</th> -->
                        <th scope="col">View Profile</th>
                        <th scope="col">Confirm</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>

                <?php
                $table = "SELECT * from login where id in (SELECT cid from status where profilestatus = 0) ";
                $result = mysqli_query($con, $table);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $row["id"]; ?>
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
                                <!-- <td>
                  <?php echo $row["email"]; ?>
                </td> -->
                                <?php

                                ?>
                                <td>
                                    <a href="managing_view.php?id=<?= $row["id"] ?>" class="btn btn-outline-secondary" style="color:white" ;>View</a>
                                </td>
                                <?php
                                ?>
                                <td>
                                    <!-- <?php echo $row["id"]; ?> -->
                                    <!-- <input type="button" value="confirm" id=<?php $row["id"]; ?> name="confirm" style="background:red;border-radius:5px;color:white"/> -->
                                    <a href="managing_confirm.php?id=<?= $row["id"] ?>" class="btn btn-outline-primary" style="color:whitesmoke" ;>Confirm</a>
                                </td>
                                <?php
                                ?>
                                <td>
                                    <!-- <?php echo $row["id"]; ?> -->
                                    <!-- <input type="button" value="remove" id=<?php $row["id"]; ?> name="remove" style="background:blue;border-radius:5px;color:white"/> -->
                                    <a href="blacklist.php?id=<?= $row["id"] ?>" class="btn btn-outline-danger" style="color:whitesmoke" ;>Remove</a>
                                </td>
                            </tr>
                        </tbody>
                    <?php

                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6">
                            <center>
                                No New Entry
                            </center>
                        </td>
                    </tr>
                <?php
                }
                ?>





































            </table>
        </div>
        <br>
    </form>
    <script>
        feather.replace()
    </script>
</body>

</html>