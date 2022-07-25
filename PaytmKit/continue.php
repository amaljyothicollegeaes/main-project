continue
<?php
session_start();
echo $_SESSION['id'];
header("Location: ../main.php");
?>