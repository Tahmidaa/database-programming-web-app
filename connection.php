<?php
    $hostname = "localhost/XE";
    $username = "system";
    $pwd = "sehar";


    $conn = oci_connect($username, $pwd, $hostname);

    if(!$conn){
        echo mysqli_connect_error();
    }
        
?>