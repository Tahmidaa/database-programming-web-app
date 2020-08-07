 <?php
            $query = "BEGIN
                      :c := totalCustomers();
                      END;";
            $run = oci_parse($conn, $query);
            oci_bind_by_name($run, ':c', $count , 2);
            oci_execute($run);
            echo "<p> Counts = $count </p>";
    ?>

