<?php
function checklogin($con)
{
    if(isset($_SESSION['id']))
    {
        $id = $_SESSION['id'];
        $query = "select * from login where id = '$id' limit 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) >0)
        {
            $userdata=mysqli_fetch_assoc($result);
            return $userdata;
        }
    }
    
    header("Location: Login.php");
    die;
}