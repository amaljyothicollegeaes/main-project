<?php
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// echo $_SESSION;


$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ewed";
$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);


// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if ($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		// echo "<b>Transaction status is success</b>" . "<br/>";

		// echo " 00000 / ";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.






		$amount = $_POST["TXNAMOUNT"];
		$res_id = $_POST["ORDERID"];
		$id_s = explode('.', $res_id);


		//order id
		// print_r($id_s[0]);
		$order_id = $id_s[0];
		//session id

		
		$var = $id_s[1];
		$var3 = intval($var);
		// echo $var3;
		$_SESSION['id'] = $var3;
		echo $_SESSION['id'];

		$query = "INSERT into tlb_bill (cid,order_id,amount) values ($var3,'$order_id',$amount)";
		$a = mysqli_query($con, $query);
		if($a){
			echo "working";
		}

		$month = $amount / 100;
		echo $month;
		$query1 = "UPDATE tbl_account_validity set month = $month where cid = $var3;";
		$b = mysqli_query($con, $query1);

		if ($b) {
			echo "working";
		}




		$bank = $_POST['BANKNAME'];
		header("Location: payment_successxx.php?month=$month&orderid=$order_id&bank=$bank");

		//
	} else {
		echo "<b>Transaction status is failure</b>" . "<br/>";

		$amount = $_POST["TXNAMOUNT"];
		$res_id = $_POST["ORDERID"];
		$id_s = explode('.', $res_id);
		$month = $amount / 100;
		$bank = $_POST['BANKNAME'];
		$order_id = $id_s[0];
		$var = $id_s[1];
		$var3 = intval($var);
		$_SESSION['id'] = $var3;
		

		header("Location: payment_failedxx.php?month=$month&orderid=$order_id&bank=$bank");


	}

	// if (isset($_POST) && count($_POST) > 0) {
	// 	foreach ($_POST as $paramName => $paramValue) {
	// 		echo "<br/>" . $paramName . " = " . $paramValue;
	// 	}
	// }
	// header("Location: payment_successxx.php");
} else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}
