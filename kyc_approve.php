<?php
session_start();
echo $id = $_SESSION['id'];
echo $value = $_POST['idzz'];

include("connection.php");

$query = "UPDATE status 
        SET 
        proof_status = 1
        WHERE cid = $value ";
$result = mysqli_query($con, $query);
if ($result) {
    header("Location: managing_view.php?id=$value");
}
else{
    echo "unknown error in reaching database !!!";
}