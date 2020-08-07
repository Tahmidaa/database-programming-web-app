<?php

    require("connection.php");

    $cusid = $_POST['id'];
    $address = $_POST['add'];
    echo $cusid;


    $query = "BEGIN
              update customers
              set ADDRESS = '$address'
              where customer_id='$cusid';
              END;";

    $run = oci_parse($conn, $query);
    oci_execute($run);

    if (!$run) {
        echo "Oops !! ERROR";
    } else {
        header("location:index.php");
    }
?>
