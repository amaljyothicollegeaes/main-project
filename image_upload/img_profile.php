<?php
session_start();
$e = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id'] = $_GET['id'];
}

if (isset($_GET["error"])) {
    $e = $_GET["error"];
    if ($e == "2") {
        $e = "<div class='alert alert-danger text-center alert-dismissible'>
                
                <h5> Size Too Large,Image size should be less than 1mb.</h5>
            </div>";
    } elseif ($e == "3") {
        $e = "<div class='alert alert-danger text-center alert-dismissible'>
                
                <h5>File Type Not Supported...</h5>
            </div>";
    } elseif ($e == "1") {
        $e = "<div class='alert alert-danger text-center alert-dismissible'>
                
                <h5>Unknown Error Occurred...</h5>
            </div>";
    } else {
        $e = "";
    }
}
?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</head>

<body>
    <center>
        <label for="formFile" class="form-label" style="color:red;font-size:x-large;margin-top: 5%;">Upload Your Images</label>
    </center>
    <form name="upload" method="post" action="uploadimages.php" enctype="multipart/form-data" style="margin: 50px;">

        <?php
        echo $e;
        ?>

        <div class="mb-4">
            <label for="formFile" class="form-label">Profile Image</label>
            <input class="form-control" type="file" name="profile" required />
        </div>

        <label for="formFile" class="form-label">Other Images</label>
        <div class="mb-4">
            <input class="form-control" type="file" name="image1" required />
        </div>

        <div class="mb-4">
            <input class="form-control" type="file" name="image2" required />
        </div>

        <div class="mb-4">
            <input class="form-control" type="file" name="image3" required />
        </div>

        <div class="mb-4">
            <input class="form-control" type="file" name="image4" required />
        </div>

        <center>
            <input type="submit" name="submit" class="btn btn-outline-primary" />
        </center>


    </form>
</body>


</html>