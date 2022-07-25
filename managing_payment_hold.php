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

    <form class="border border-2 border-info rounded " style="margin-right:4%;margin-left:4%;background-color:white">
        <br>
        <center>
            <h3 class="rounded" style="color:white;margin-right:1%;margin-left:1%;padding:1%;background-color:blue">VERIFIED USERS</h3>
        </center><br>
        <div class="container">
            <table id="example" class="table table-dark table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" style="color:whitesmoke">ID</th>
                        <th scope="col" style="color:whitesmoke">Image</th>
                        <th scope="col" style="color:whitesmoke">User Name</th>
                        <th scope="col" style="color:whitesmoke">Email</th>
                        <!-- <th scope="col" style="color:whitesmoke">KYC Status</th> -->
                        <th scope="col" style="color:whitesmoke">View Profile</th>
                        <th scope="col" style="color:whitesmoke">Remove</th>
                    </tr>
                </thead>

                <?php
                $table = "SELECT * from profiledata where cid in (SELECT cid from status where profilestatus = 1) ";
                $result = mysqli_query($con, $table);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <?php
                        $cid = $row["cid"];
                        $fetch_proof_status = "SELECT proof_status FROM status where cid = $cid";
                        $fetch_proof_status_result = mysqli_query($con, $fetch_proof_status);
                        $data_fetch_proof_status_result = mysqli_fetch_assoc($fetch_proof_status_result);
                        if ($data_fetch_proof_status_result["proof_status"] == 0) {





                            $query_account_validity = "SELECT * FROM tbl_account_validity where cid = $cid";
                            $result_account_validity = mysqli_query($con, $query_account_validity);
                            $data_result_account_validity = mysqli_fetch_assoc($result_account_validity);

                            $month = $data_result_account_validity["month"];
                            $url = $data_result_account_validity["timestamp_account"];
                            $today = date("Y-m-d");
                            "today" . $today;
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
                            $dt->modify("+5 month");
                            $dt->format("Y M D");
                            $dt->format("Y M D");


                            $k = 0;
                            if ($dt_today <= $dt) {
                            } else {
                                $k = 1;
                            }



                            if ($k == 1) {
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


                                    <td>
                                        <?php echo $row["fname"] . " " . $row["lname"]; ?>
                                    </td>


                                    <td>
                                        <?php echo $row["email"]; ?>
                                    </td>


                                    <td>

                                        <a href="managing_view.php?id=<?= $row["cid"] ?>" class="btn btn-outline-secondary" style="color:whitesmoke" ;>View</a>
                                    </td>


                                    <td>
                                        <a href="managing_blacklist_remove.php?id=<?= $row["cid"] ?>" class="btn btn-outline-danger" style="color:whitesmoke" ;>Remove</a>
                                    </td>














                                </tr>

                            <?php
                            }






                            ?>



























                        <?php
                        }
                        ?>




                        <!-- <tr>
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



                            <td>
                                <?php
                                $fetch_proof_status = "SELECT proof_status FROM status where cid = $cid";
                                $fetch_proof_status_result = mysqli_query($con, $fetch_proof_status);
                                $data_fetch_proof_status_result = mysqli_fetch_assoc($fetch_proof_status_result);
                                if ($data_fetch_proof_status_result["proof_status"] == 0) {
                                ?>



                                    <input type="button" readonly value="KYC To Be Processed" class="btn btn-outline-primary " style="color:white;" />

                                <?php
                                } elseif ($data_fetch_proof_status_result["proof_status"] == 2) {
                                ?>
                                    <input type="button" readonly value="KYC Rejected" class="btn btn-outline-danger " style="color:white;" />
                                <?php
                                } else {
                                ?>
                                    <input type="button" readonly value="KYC Approved" class="btn btn-outline-primary " style="color:white;" />











                                <?php
                                }
                                ?>
                            </td>





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
                        </tr> -->
                    <?php

                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="7">
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
    </form>
    <script>
        feather.replace()
    </script>
</body>

</html>