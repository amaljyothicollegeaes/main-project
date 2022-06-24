<?php
session_start();

include("function.php");

$userid = $_SESSION['id'];
$profileids = $_GET['id'];

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ewed";
$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

echo $userid;
echo $profileids;



$table = "SELECT * from interest where cid = $userid and iid = $profileids";
$result = mysqli_query($con, $table);
if (mysqli_num_rows($result) > 0) {

    header("Location: viewprofile.php?id=$profileids");
} else {
    $query = "INSERT into interest (cid,iid,messages) values ('$userid','$profileids','message')";
    $result = mysqli_query($con, $query);
    $query2 = "INSERT into matchaccept (cid,mid) values ('$userid','$profileids')";
    $result2 = mysqli_query($con, $query2);
    if ($result) {
        //just for notification purpose
        $query1 = "UPDATE status SET interest = 1 where cid = '$profileids'";
        $result1 = mysqli_query($con, $query1);
        header("Location: viewprofile.php?id=$profileids");
    }
}
