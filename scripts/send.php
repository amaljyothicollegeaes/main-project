<?php

// session start
session_start();

// include db connection
// include('./db.php');
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ewed";
$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

// declaring variables
$sent_by = "";
$received_by = "";
$message = "";
$createdAt = date("Y-m-d h:i:sa");

// get data from form
if (isset($_POST['sent_by'])) {

    $sent_by = $_POST['sent_by'];
}

if (isset($_POST['received_by'])) {

    $received_by = $_POST['received_by'];
}

if (isset($_POST['message'])) {

    $message = $_POST['message'];
}

if ($message != "") { // if message box is not empty!

    // send message
    $sendMessage = "INSERT INTO messages(sent_by,received_by,message,createdAt) VALUES('$sent_by','$received_by','$message','$createdAt')";
    $sendMessageStatus = mysqli_query($con, $sendMessage) or die(mysqli_error($con));

    if ($sendMessageStatus) {
        echo $received_by;
        header("Location: ../message.php?id=$received_by");
    } else {

        header("Location: ../message.php?id=$received_by");
    }
}
