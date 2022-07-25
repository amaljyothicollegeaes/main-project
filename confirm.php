<?php
if (isset($_GET['id'])) {
    $ids = $_GET['id'];
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbname = "ewed";
    $con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

    $query = "UPDATE status 
    SET 
    profilestatus = 1
    WHERE cid = $ids ";

    $query1 = "UPDATE status 
    SET 
    report = 0
    WHERE cid = $ids ";

    $result1 = mysqli_query($con, $query1);

    $result = mysqli_query($con, $query);
    if ($result) {
        header("Location: adminuser.php");
    }
}
