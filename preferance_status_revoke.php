<?php
session_start();
echo $id = $_SESSION['id'];
echo $value = $_POST['idzz'];

include("connection.php");

$query = "UPDATE status 
        SET 
        preferance_status = 1
        WHERE cid = $id ";
$result = mysqli_query($con, $query);
if ($result) {
    header("Location: settings.php");
} else {
    echo "unknown error in reaching database !!!";
}
