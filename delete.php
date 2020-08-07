<?php
require("connection.php");
$id = $_GET['id'];

$query = "delete from customers where CUSTOMER_ID=" . $id;

$run = oci_parse($conn, $query);
oci_execute($run);

if (!$run) {
    echo "Oops !! ERROR";
} else {
    header("location:index.php");
}
