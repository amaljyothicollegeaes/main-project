 <?php
	session_start();
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	$id = $_SESSION['id'];
	$value = $_GET['choose'];
	?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
 <html>

 <head>
 	<title>Merchant Check Out Page</title>
 	<meta name="GENERATOR" content="Evrsoft First Page">
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 </head>

 <body style="background-color:#e8eff4">
 	<br><br><br><br><br><br><br><br>
 	<center>
 		<div style="background-color:white;margin-right:20%;margin-left:20%;border-radius: 5px;box-shadow: 1px 1px 5px 5px lightblue">
 			<h1 style="color:white;background-color:blue;border-radius: 6px 6px 0px 0px">Your Payment Details</h1>

 			<form method="post" action="pgRedirect.php">
 				<table style="border:none">
 					<tbody class="form-table">
 						<tr style="border-top:1px solid">
 							<th style="color:blue">S.No</th>
 							<th style="text-align:left;color:blue">Label</th>
 							<th style="text-align:left;color:blue">Value</th>
 						</tr>
 						<tr>
 							<td>#</td>
 							<td><label>ORDER ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label></td>
 							<td><input style="border:none" type="text" readonly id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000000, 99999999) ?>">
 							</td>
 						</tr>

 						<tr>

 							<input type="hidden" style="border:none;" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?= $id ?>">

 						</tr>

 						<input type="hidden" style="width:100%" readonly id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">

 						<tr>
 							<td>#</td>
 							<td><label>Total Months : </label></td>
 							<td><input style="border:none;width:100%" readonly id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="<?= $value ?>"></td>
 						</tr>

 						<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">

 						<tr>
 							<?php $amount = $value * 100; ?>
 							<td>#</td>
 							<td><label>Total Amount :</label></td>
 							<td><input style="border:none" title="TXN_AMOUNT" readonly tabindex="10" type="text" name="TXN_AMOUNT" value="<?= $amount ?>">
 							</td>
 						</tr>
 						<br>
 						<tr>
 							<td></td>
 							<td></td>
 							<td><input value="Pay" type="submit" onclick="" class="btn btn-primary"></td>
 						</tr>
 					</tbody>
 				</table>
 				<br>
 			</form>
 		</div>
 	</center>
 </body>

 </html>