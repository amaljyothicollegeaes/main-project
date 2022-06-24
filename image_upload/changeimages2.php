<?php
session_start();
if (isset($_POST['submit3'])) {



    echo "second";



    include("db_connection.php");
    // $img_name = $_FILES['profile']['name'];
    // $img_size = $_FILES['profile']['size'];
    // $tep_name = $_FILES['profile']['tmp_name'];
    // $error = $_FILES['profile']['error'];
    // $img_type = $_FILES['profile']['type'];

    // $img_name1 = $_FILES['image1']['name'];
    // $img_size1 = $_FILES['image1']['size'];
    // $tep_name1 = $_FILES['image1']['tmp_name'];
    // $error1 = $_FILES['image1']['error'];
    // $img_type1 = $_FILES['image1']['type'];

    $img_name2 = $_FILES['image2']['name'];
    $img_size2 = $_FILES['image2']['size'];
    $tep_name2 = $_FILES['image2']['tmp_name'];
    $error2 = $_FILES['image2']['error'];
    $img_type2 = $_FILES['image2']['type'];

    // $img_name3 = $_FILES['image3']['name'];
    // $img_size3 = $_FILES['image3']['size'];
    // $tep_name3 = $_FILES['image3']['tmp_name'];
    // $error3 = $_FILES['image3']['error'];
    // $img_type3 = $_FILES['image3']['type'];

    // $img_name4 = $_FILES['image4']['name'];
    // $img_size4 = $_FILES['image4']['size'];
    // $tep_name4 = $_FILES['image4']['tmp_name'];
    // $error4 = $_FILES['image4']['error'];
    // $img_type4 = $_FILES['image4']['type'];


    // if ($error === 0 || $error1 === 0 || $error2 === 0 || $error3 === 0 || $error4 === 0)
    if ($error2 === 0) {
        if ($img_size2 > 125000) {

            $em2 = "2";
            header('Location: changeimagefront.php?error=' . $em2);
        } else {
            // $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
            // $img_extension1 = pathinfo($img_name1, PATHINFO_EXTENSION);
            $img_extension2 = pathinfo($img_name2, PATHINFO_EXTENSION);
            // $img_extension3 = pathinfo($img_name3, PATHINFO_EXTENSION);
            // $img_extension4 = pathinfo($img_name4, PATHINFO_EXTENSION);


            // $img_extension_low = strtolower($img_extension);
            // $img_extension_low1 = strtolower($img_extension1);
            $img_extension_low2 = strtolower($img_extension2);
            // $img_extension_low3 = strtolower($img_extension3);
            // $img_extension_low4 = strtolower($img_extension4);


            $allowed_extensions = array("jpeg", "jpg", "png", "gif");

            if (in_array($img_extension_low2, $allowed_extensions)) {
                // $new_image_name = uniqid("IMG-", true) . '.' . $img_extension_low;
                // $new_image_name1 = uniqid("IMG-", true) . '.' . $img_extension_low1;
                $new_image_name2 = uniqid("IMG-", true) . '.' . $img_extension_low2;
                // $new_image_name3 = uniqid("IMG-", true) . '.' . $img_extension_low3;
                // $new_image_name4 = uniqid("IMG-", true) . '.' . $img_extension_low4;


                // $img_upload_path = 'images/' . $new_image_name;
                // $img_upload_path1 = 'images/' . $new_image_name1;
                $img_upload_path2 = 'images/' . $new_image_name2;
                // $img_upload_path3 = 'images/' . $new_image_name3;
                // $img_upload_path4 = 'images/' . $new_image_name4;
                echo 'hello';



                //insert new image

                $id = $_SESSION['id'];
                echo $id;
                //$imageqeury = "INSERT INTO photos (profiles,pic1,pic2,pic3,pic4) values ('$new_image_name','$new_image_name1','$new_image_name2','$new_image_name3','$new_image_name4') where cid = '59' ";
                $imageqeury = "UPDATE photos SET pic2='$new_image_name2' WHERE cid = $id ";

                $imageresult = mysqli_query($connection, $imageqeury);
                if ($imageresult) {
                    echo $_SESSION['id'];
                    // move_uploaded_file($tep_name, $img_upload_path1);
                    // move_uploaded_file($tep_name1, $img_upload_path1);
                    move_uploaded_file($tep_name2, $img_upload_path2);
                    // move_uploaded_file($tep_name3, $img_upload_path3);
                    // move_uploaded_file($tep_name4, $img_upload_path4);
                    header('Location: changeimagefront.php?id=' . $id);
                }
            } else {
                $em1 = "3";
                header('Location: changeimagefront.php?error=' . $em1);
            }
        }
    } else {
        $em = "1";
        header('Location: changeimagefront.php?error= ' . $em);
    }
} else {
    header('Location: changeimagefront.php');
}
