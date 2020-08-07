<?php

require("connection.php");

?>

<?php
$cusid = $_POST['cusid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$icno = $_POST['icno'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$phoneno = $_POST['phoneno'];

$query = "Insert into customers
            values('$cusid', '$icno', '$fname', '$lname', '$address', '$postcode', '$phoneno')";

$run = oci_parse($conn, $query);
oci_execute($run);

if (!$run) {
    echo "Oops !! ERROR";
} else {
    header("location:index.php");
}
?>