<?php 

    $con = mysqli_connect("localhost", "root", "", "project103");

    if (!$con) {
        die("Failed to connec to databse " . mysqli_error($con));
    }

?>