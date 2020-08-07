<?php

require("connection.php");


$cusid = $_POST['cusid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$icno = $_POST['icno'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$phoneno = $_POST['phoneno'];

$query = "UPDATE customers SET C_FNAME = '$fname', 
							   C_LNAME = '$lname', 
							   IC_NO = '$icno', 
							   ADDRESS = '$address', 
							   POSTCODE = '$postcode', 
							   PHONENO = '$phoneno' 
							   where CUSTOMER_ID='$cusid'";
$run = oci_parse($conn,$query);
oci_execute($run);


if($run)
	header("location:index.php");

?>