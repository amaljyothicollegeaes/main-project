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




//for accept read becomes 0
$query1 = "UPDATE interest SET ReadOrNot = 0 where cid = '$profileids'";
$result = mysqli_query($con, $query1);
if ($result) {
    //for accept matchAccept becomes 1
    $query2 = "UPDATE matchaccept SET matcheAccept = 2 where cid = '$profileids'";
    $result2 = mysqli_query($con, $query2);
    if ($result2) {
        header("Location: requests.php?id=$profileids");
    }
}
// }
// }
