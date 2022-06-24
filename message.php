<?php

// session start
session_start();

// include DB connection
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ewed";
$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

echo $_SESSION['id'];

error_reporting(0);

if (!isset($_SESSION['id'])) {

    echo $_SESSION['id'];
    header("Location:login.php");
} else {

    $id = $email = $_SESSION['id'];
    echo "session set";
}

$ids = $receiver = $_GET['id'];
echo $receiver;

$query = "SELECT * FROM login WHERE id = '$receiver'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$data = mysqli_fetch_assoc($result);
$data_received_by = $data['fname'];



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wassup</title>
    <!-- external stylesheets -->
    <link rel="stylesheet" href="assets/css/chats.css">
    <link rel="stylesheet" href="assets/css/message.css">
    <!-- Fontawesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body background="s_images/chat.png">



    <nav class="navbar navbar-light bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:blue;margin-left:40px">
                <h2>E Wed</h2>
            </a>

            <?php
            $fetchimage = "SELECT * FROM photos where cid = $id";
            $fetchimageresult = mysqli_query($con, $fetchimage);
            // echo $value;
            while ($fetchimageresultdata = mysqli_fetch_assoc($fetchimageresult)) {
                // echo $fetchimageresultdata["profiles"];

                $user_name = "SELECT fname,lname FROM login where id = $id";
                $user_name_result = mysqli_query($con, $user_name);
                while ($user_name_result_data = mysqli_fetch_assoc($user_name_result)) { ?>
                    <h7 style="color:white">
                        <?php
                        // echo "user";
                        echo $user_name_result_data['fname'];
                        ?>
                        <br>
                    <?php
                    echo $user_name_result_data['lname'];
                }
                    ?>
                    </h7>
                    <?php

                    $name = $fetchimageresultdata["profiles"];
                    ?>
                    <img src="image_upload/images/<?php echo $name; ?>" style="width: 40px;height: 40px;border-radius:25px;border:2px solid white;margin: -75% ;" alt="Error" />
                <?php } ?>

                <button class=" navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="background:grey">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color:blue">E Wed</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="font-weight:bold;">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="personaldetail.php?id=<?= $id ?>">View and Edit Profiles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="main.php">Matches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="my_matches.php">My Matches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="requests.php?id=<?= $id ?>">Requests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                            <br>
                        </ul>
                    </div>
                </div>
        </div>
    </nav><br><br><br>





    <div class="container">
        <?php
        $getReceiver = "SELECT profiles FROM photos WHERE cid = '$receiver'";
        $getReceiverStatus = mysqli_query($con, $getReceiver) or die(mysqli_error($con));
        $getReceiverRow = mysqli_fetch_assoc($getReceiverStatus);
        $received_by = $getReceiverRow['profiles'];

        ?>
        <div class="card mt-4">
            <div class="card-header">
                <h6>
                    <img src="image_upload/images/<?= $getReceiverRow['profiles'] ?>" alt="Profile image" width="40" height="40" />
                    <strong>
                        <?= $data['fname'] ?>
                    </strong>
                    <strong>
                        <?= $data['lname'] ?>
                    </strong>
                </h6>
            </div>



            <?php
            $getMessage = "SELECT * FROM messages WHERE sent_by = '$receiver' AND received_by = '$email' OR sent_by = '$email' AND received_by = '$receiver' ORDER BY createdAt asc";
            $getMessageStatus = mysqli_query($con, $getMessage) or die(mysqli_error($con));
            if (mysqli_num_rows($getMessageStatus) > 0) {
                while ($getMessageRow = mysqli_fetch_assoc($getMessageStatus)) {
                    $message_id = $getMessageRow['id'];
            ?>
                    <div class="card-body" style="background-color:#d7e0f7;">
                        <?php
                        $value = $getMessageRow['sent_by'];
                        $query1 = "SELECT * FROM login WHERE id = '$value'";
                        $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
                        $data1 = mysqli_fetch_assoc($result1);
                        $data_received_by1 = $data1['fname'];
                        $data_received_by2 = $data1['lname'];
                        ?>
                        <h6 style="color: #007bff"><?= $data_received_by1 . " " . $data_received_by2 ?></h6>
                        <div class="message-box ml-4">
                            <p class="text-center"><?= $getMessageRow['message'] ?></p>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="card-body">
                    <p class="text-muted">No messages yet! Say 'Hi'</p>
                </div>
            <?php
            }
            ?>




            <div class="card-footer text-center">
                <form action="scripts/send.php" method="POST" style="display: inline-block">
                    <input type="hidden" name="sent_by" value="<?= $email ?>" />
                    <input type="hidden" name="received_by" value="<?= $receiver ?>" />
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <input type="text" name="message" id="message" class="form-control" placeholder="Type your message here" required />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Bootstrap scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>