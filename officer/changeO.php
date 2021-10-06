<?php

include('connect.php');

$stu_id = $_GET['stu_id'];


$Ostatus= $_GET['Ostatus'];



$q="UPDATE students set Ostatus = $Ostatus where stu_id=$stu_id";



mysqli_query($conn,$q);

header('location:detail.php');

?>