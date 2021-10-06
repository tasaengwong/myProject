<?php

include('connect.php');

$stu_id = $_GET['stu_id'];

$Cstatus= $_GET['Cstatus'];


$q="UPDATE students set Cstatus = $Cstatus where stu_id=$stu_id";



mysqli_query($conn,$q);

header('location:detail.php');

?>