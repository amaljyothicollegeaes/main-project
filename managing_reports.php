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



<body style="background-color:#e8eff4">
    <form class="border border-2 border-info rounded" style="margin-right:4%;margin-left:4%;background-color:ghostwhite">
        <br>

        <center>
            <h3 class="rounded" style="color:white;margin-right:1%;margin-left:1%;padding:1%;background-color:blue">
                Reports
            </h3>
        </center><br><br>

        <div class="container">
            <table id="example" class="table table-dark table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Sender ID</th>
                        <th scope="col">Reported ID</th>
                        <th scope="col">message</th>
                        <th scope="col">Confirm</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>

                <?php
                $table = "SELECT * from tbl_report where r_id in (SELECT r_id from tbl_report where status = 0) and cid in (SELECT cid from tbl_report where status = 0)";
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

                                    <span style="color:blue">
                                        <?php
                                        echo "ID : ";
                                        ?>
                                    </span>
                                    <?php
                                    echo $row["cid"];
                                    ?>


                                    <br>
                                    <span style="color:blue">
                                        <?php

                                        echo "Name : ";
                                        ?>
                                    </span>
                                    <?php
                                    $a = $row['cid'];
                                    $table1 = "SELECT * from login where id =  $a ";
                                    $result1 = mysqli_query($con, $table1);
                                    if (mysqli_num_rows($result1) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($result1)) {

                                            echo $row1["fname"];
                                            echo $row1["lname"];
                                        }
                                    }
                                    ?>
                                    <br>
                                    <br>
                                    <center>
                                        <a href="managing_view.php?id=<?= $a ?>" class="btn btn-outline-success" style="color:white" ;>View</a>
                                    </center>
                                </td>
                                <?php
                                ?>


                                <td>
                                    <span style="color:blue">
                                        <?php
                                        echo "ID : ";
                                        ?>
                                    </span>
                                    <?php
                                    echo $row["r_id"];
                                    ?>

                                    <br>

                                    <span style="color:blue">
                                        <?php
                                        echo "Name : ";
                                        ?>
                                    </span>
                                    <?php
                                    $b = $row['r_id'];
                                    $table1 = "SELECT * from login where id =  $b ";
                                    $result1 = mysqli_query($con, $table1);
                                    if (mysqli_num_rows($result1) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($result1)) {

                                            echo $row1["fname"];
                                            echo $row1["lname"];
                                        }
                                    }
                                    ?>
                                    <br>
                                    <br>
                                    <center>
                                        <a href="managing_view.php?id=<?= $b ?>" class="btn btn-outline-success" style="color:white" ;>View</a>
                                    </center>
                                </td>
                                <?php

                                ?>


                                <td>
                                    <?php echo $row["message"]; ?>
                                </td>



                                <td>

                                    <a href="managing_report_confirm.php?uid=<?= $a ?>&rid=<?= $b ?>" class="btn btn-outline-primary" style="color:whitesmoke" ;>Confirm</a>

                                </td>


                                <td>
                                    <a href="managing_report_reject.php?uid=<?= $a ?>&rid=<?= $b ?>" class="btn btn-outline-danger" style="color:whitesmoke" ;>Remove</a>
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