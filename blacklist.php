<?php
if(isset($_GET['id']))
{
$ids = $_GET['id'];
$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="ewed";
$con = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

$query = "UPDATE status 
    SET 
    profilestatus = 4
    WHERE cid = $ids ";

$result=mysqli_query($con,$query);
        if($result)
        {
        header("Location: adminuser.php");
        }


}
?>