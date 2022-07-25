<?php
session_start();
if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $rid = $_GET['rid'];

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbname = "ewed";
    $con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);



    $k = 0;





    echo " / data /";


    // get status  value
    $query_status_value = "SELECT report from status where cid = $uid";
    $result_query_status_value = mysqli_query($con, $query_status_value);
    $data_result_query_status_value = mysqli_fetch_array($result_query_status_value);

    echo $data_result_query_status_value['report'];
    $data1 = $data_result_query_status_value['report'];
    $data1 = $data1 + 1;
    echo " = " . $data1;





    // update
    $query1 = "UPDATE status SET report = $data1 WHERE cid = $uid ";

    $query2 = "UPDATE tbl_report SET status = 1 WHERE cid = $uid and r_id  = $rid ";



    $result2 = mysqli_query($con, $query2);
    if ($result2) {


        $result1 = mysqli_query($con, $query1);
        if ($result1) {
            echo "data updated";
            // header("Location: managing_reports.php");
            $k = 1;
        }
    }

    $query_status_value = "SELECT report from status where cid = $uid";
    $result_query_status_value = mysqli_query($con, $query_status_value);
    $data_result_query_status_value = mysqli_fetch_array($result_query_status_value);

    echo $data_result_query_status_value['report'];
    $data1 = $data_result_query_status_value['report'];
    echo " = " . $data1;

    if ($data1 >= 10) {
        $query = "UPDATE status SET profilestatus = 4 WHERE cid = $uid ";

        $result = mysqli_query($con, $query);
        if ($result) {
            // header("Location: managing_reports.php");
            $k = 1;
        }
    }

    if ($k == 1) {
        header("Location: managing_reports.php");
    }else {
        echo "error";
    }
}
