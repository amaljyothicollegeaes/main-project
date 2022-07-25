<?php




// if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(!empty($_POST['search'])){

    // $value = $_POST['ID'];
    $value = "1";


    // $id = $_SESSION['id'];
    if (!isset($_SESSION['id'])) {
        header("Location:login.php?value=" . $value);
    } else {
    }
}

?>
<html lang="en">

<head>
    <title>E Wed</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main">
        <div class="navbar">

            <div class="icon">
                <h2 class="logo" style="margin-top: 1px;color:blue">E Wed </h2>
            </div>


            <div class="menu">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="login.php?value=0">LOGIN</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </div>

            <div class="search">
                <!-- <form action="ID_check.php" method="POST"> -->
                <form method="POST">

                    <input class="srch" style="border-color:blue" type="search" name="ID" id="ID" placeholder="Enter ID" required />
                    <!-- <a href="#"> -->
                    <input type="submit" name="search" id="search" class="btn" style="background:blue;border: 2px solid blue;margin-top: 13px;color: white;font-size: 15px;border-top-left-radius: 0px;border-bottom-left-radius: 0px;" />
                    <!-- </a> -->
                </form>
            </div>


        </div>
    </div>
</body>

</html>