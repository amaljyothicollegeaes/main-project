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



    //user data
    // $query = "SELECT report from status where cid = $rid";
    // $result = mysqli_query($con, $query);
    // if (mysqli_num_rows($result) > 0) {

    //     echo mysqli_num_rows($result);
    //     echo "set";
    //     $data = mysqli_fetch_array($result);
    //     echo $data['report'];
    // }else{
    //     echo mysqli_num_rows($result);
    // }





    $query = "SELECT * from tbl_report where cid = $uid and r_id = $rid and status = 1";
    $result = mysqli_query($con, $query);
    // does user exist
    if (mysqli_num_rows($result) > 0) {

        echo mysqli_num_rows($result);
        echo "user exist";
        header("Location: managing_reports.php");
    } else {
        echo mysqli_num_rows($result);
        echo "\ user not exist /";
        echo " uid : " . $uid;
        echo "\ rid : " . $rid;



        $query_first_time_user = "SELECT * from tbl_report where cid = $uid and r_id = $rid and status = 0";
        $result_first_time_user = mysqli_query($con, $query_first_time_user);
        if (mysqli_num_rows($result_first_time_user) > 0) {

            echo " / data /";


            // get status  value
            $query_status_value = "SELECT report from status where cid = $rid";
            $result_query_status_value = mysqli_query($con, $query_status_value);
            $data_result_query_status_value = mysqli_fetch_array($result_query_status_value);

            echo $data_result_query_status_value['report'];
            $data1 = $data_result_query_status_value['report'];
            $data1 = $data1 + 1;
            echo " = " . $data1;





            // update
            $query1 = "UPDATE status SET report = $data1 WHERE cid = $rid ";

            $query2 = "UPDATE tbl_report SET status = 1 WHERE cid = $uid and r_id  = $rid ";



            $result2 = mysqli_query($con, $query2);
            if ($result2) {


                $result1 = mysqli_query($con, $query1);
                if ($result1) {



                    $query_status_value = "SELECT report from status where cid = $rid";
                    $result_query_status_value = mysqli_query($con, $query_status_value);
                    $data_result_query_status_value = mysqli_fetch_array($result_query_status_value);

                    echo $data_result_query_status_value['report'];
                    $data1 = $data_result_query_status_value['report'];
                    echo " = " . $data1;

                    if ($data1 >= 10) {
                        $query = "UPDATE status SET profilestatus = 4 WHERE cid = $rid ";

                        $result = mysqli_query($con, $query);
                        if ($result) {
                            
                        }
                    }

                    








                    echo "data updated";
                    header("Location: managing_reports.php");
                }
            }
        }
    }
}
// header("Location: managing_reports.php");