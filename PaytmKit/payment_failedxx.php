<?php
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ewed";
$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);




$id = $_SESSION['id'];
// echo $id;
// if (!isset($_SESSION['id'])) {
//     header("Location:login.php");
// }

$bank = $_GET['bank'];
$order_id = $_GET['orderid'];
$month = $_GET['month'];




?>
<html>

<head>
    <title>E Wed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body style="background-color:#e8eff4">


    <br><br><br><br><br><br><br>

    <center>
        <div style="background-color:white;margin-right:20%;margin-left:20%;border-radius: 5px;box-shadow: 1px 1px 5px 5px lightblue">
            <h1 style="color:white;background-color:red;border-radius: 6px 6px 0px 0px">Payment Failed</h1>

            <!-- <label style="color:red">Unknown Error</label> -->

            <form method="post" action="continue.php">
                <table style="border:none">
                    <tbody class="form-table">
                        <tr style="border-top:1px solid">
                            <th style="text-align:left;color:blue">#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            <th style="text-align:left;color:blue">Label</th>
                            <th style="text-align:left;color:blue">Value</th>
                        </tr>
                        <tr>
                            <td>#</td>
                            <td><label>ORDER ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; </label></td>
                            <td><input style="border:none" type="text" readonly id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?= $order_id  ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>#</td>
                            <td><label>Bank Name &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; </label></td>
                            <td>
                                <input style="border:none;" id="CUST_ID" tabindex="2" maxlength="15" size="15" name="CUST_ID" autocomplete="off" value="<?= $bank ?>">
                            </td>
                        </tr>


                        <tr>
                            <td>#</td>
                            <td><label>Total Months :&nbsp;&nbsp; </label></td>
                            <td><input style="border:none;width:100%" readonly id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="<?= $month ?>"></td>

                        </tr>


                        <tr>
                            <?php $amount = $month * 100; ?>
                            <td>#</td>
                            <td><label>Total Amount :&nbsp;&nbsp;</label></td>
                            <td><input style="border:none" title="TXN_AMOUNT" readonly tabindex="10" type="text" name="TXN_AMOUNT" value="<?= $amount ?>">
                            </td>
                        </tr>
                        <br>

                        <tr>
                            <td></td>
                            <td></td>
                            <td><input value="Continue" type="submit" onclick="" class="btn btn-primary"></td>
                        </tr>
                    </tbody>
                </table>
                <br>
            </form>
        </div>
    </center>







</body>

</html>