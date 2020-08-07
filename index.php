<?php

require("connection.php");

?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="/crud/script.js"></script>
</head>

<body style="width:100%">

    <?php
            $query = "BEGIN
                      :c := totalCustomers();
                      END;";
            $run = oci_parse($conn, $query);
            oci_bind_by_name($run, ':c', $count , 2);
            oci_execute($run);
            echo "<p> Counts = $count </p>";
    ?>

    <div class="container">
        <div class="center" style="text-align:center">
            <h1>Customer Details</h1>

            <form method="POST" action="insert.php">
                <div class="form-group">
                    <input class="form-control " type="text" name="fname" size="25" placeholder="Customer First Name" id='uname'  required /><br>
                    <input class="form-control " type="text" name="lname" size="25" placeholder="Customer Last Name" id='uname' required /><br>
                    <input class="form-control " type="text" name="icno" size="25" placeholder="IC/Passpord Number" id='icnumber' required  /><br>
                    <input class="form-control " type="number" name="cusid" size="25" placeholder="Customer ID" id='cid' required  /><br>
                    <input class="form-control " type="text" name="address" size="100" placeholder="Address" id='address'  required /><br>
                    <input class="form-control " type="number" name="postcode" size="25" placeholder="Post Code" id='postcode'  required /><br>
                    <input class="form-control " type="number" name="phoneno" size="25" placeholder="Phone Number" id='phonenumber'  required /><br>
                    <button type="submit" class="btn btn-primary" id="sub">Insert</button>
                </div>
            </form>
        </div>
    </div>




    <br><br>


    <?php
    $query = "SELECT * FROM customers";
    $record = oci_parse($conn, $query);
    oci_execute($record);
    if ($record) {

        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Customer ID</th>
                    <th scope="col">IC No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Post Code</th>
                    <th scope="col">Phone#</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while ($row = oci_fetch_array($record)) {

                    echo "<tr>
                    <td>" . $row['CUSTOMER_ID'] . "</td>
                    <td>" . $row['IC_NO'] . "</td>
                    <td>" . $row['C_FNAME'] . " " . $row['C_LNAME'] . "</td>
                    <td>" . $row['ADDRESS'] . "</td>
                    <td>" . $row['POSTCODE'] . "</td>
                    <td>" . $row['PHONENO'] . "</td>
                    <td> <a href='edit_view.php?id=".$row['CUSTOMER_ID']."' class='btn btin-sm btn-primary'>edit</a> | <a href='delete.php?id=".$row['CUSTOMER_ID']."' class='btn btn-sm btn-danger'>Delete</a></td>
                </tr>";
                }
            }
            ?>
            </tbody>
        </table>
        <br><br>
        <h2>Procedure Call</h2>
        <form method="POST" action="procedure.php">
            <input class="form-control col-2" type="text" name="id" size="25" placeholder="Customer ID" id='uname'  required /><br>
            <input class="form-control col-2" type="text" name="add" size="100" placeholder="Address" id='uname'  required /><br>
            <button type="submit" class="btn btn-primary col-2" id="sub">Submit</button>
        </form>






</body>



</html>
