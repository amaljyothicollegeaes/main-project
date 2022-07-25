<?php
session_start();
echo $id = $_SESSION['id'];
echo $value = $_POST['idzz'];

include("connection.php");

$query = "UPDATE status 
        SET 
        profilestatus = 4
        WHERE cid = $id ";
$result = mysqli_query($con, $query);
if ($result) {
    unset($_SESSION['id']);
    header("Location: login.php");
} else {
    echo "unknown error in reaching database !!!";
}
