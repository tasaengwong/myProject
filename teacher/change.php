<?php

include('connect.php');

$stu_id = $_GET['stu_id'];
$status= $_GET['status'];


$q="UPDATE students set status = $status where stu_id=$stu_id";



mysqli_query($conn,$q);

header('location:infromation.php');

?>