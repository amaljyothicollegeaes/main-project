<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "db_feedback";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname)) {
    die("failed to connect");
}

echo $fullname = $_GET['fullname'];
