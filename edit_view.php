<?php

require("connection.php");
$id = $_GET['id'];
?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="/crud/script.js"></script>
</head>

<body>
    
    <?php
    

    $query = "select * from customers where CUSTOMER_ID=".$id;
    $run = oci_parse($conn,$query);
    oci_execute($run);

    if($run)
    {
        $row = oci_fetch_array($run);

        echo "<div class='container'>
                <div class='center' style='text-align:center'>
                    <h1>Update Record # '".$id."</h1>
                    <form method='POST' action='edit.php'>
                        <div class='form-group'>
                            <input class='form-control ' type='number' name='cusid' size='25' placeholder='Customer ID' id='cid' value='". $row['CUSTOMER_ID'] ."' hidden required  /><br>
                            <input class='form-control ' type='text' name='fname' size='25' placeholder='Customer First Name' id='uname' value='". $row['C_FNAME'] ."'  required /><br>
                            <input class='form-control ' type='text' name='lname' size='25' placeholder='Customer Last Name' id='uname' value='". $row['C_LNAME'] ."' required /><br>
                            <input class='form-control ' type='text' name='icno' size='25' placeholder='IC/Passpord Number' id='icnumber' value='". $row['IC_NO'] ."' required  /><br>
                            <input class='form-control ' type='text' name='address' size='100' placeholder='Address' id='address' value='". $row['ADDRESS'] ."' required /><br>
                            <input class='form-control ' type='number' name='postcode' size='25' placeholder='Post Code' id='postcode' value='". $row['POSTCODE'] ."' required /><br>
                            <input class='form-control ' type='number' name='phoneno' size='25' placeholder='Phone Number' id='phonenumber' value='". $row['PHONENO'] ."' required /><br>
                            <button type='submit' class='btn btn-primary col-2' id='sub'>Update</button>
                        </div>    
                    </form>
                </div>
            </div>";
    }
    ?>

</body>

</html>