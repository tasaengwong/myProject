<?php

//fetch.p

include('ex.php');

$column = array('as_id ', 'teac_N', 'teac_L', 'major_name', 'comp_name', 'qs_id1', 'qs_id2', 'qs_id3');

$query = "SELECT * from asses_teac";

if(isset($_POST['search']['value']))
{
 $query .= '
 WHERE as_id  LIKE "%'.$_POST['search']['value'].'%" 
 OR teac_N LIKE "%'.$_POST['search']['value'].'%" 
 OR teac_L LIKE "%'.$_POST['search']['value'].'%" 
 OR major_name LIKE "%'.$_POST['search']['value'].'%"
 OR comp_name LIKE "%'.$_POST['search']['value'].'%"  
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY as_id DESC ';
}

$query1 = '';

if($_POST['length'] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();


                     
                      
foreach($result as $row)
{
 $sub_array = array();

 $sub_array[] = $row['teac_N'];
 $sub_array[] = $row['teac_L'];
 $sub_array[] = $row['major_name'];
 $sub_array[] = $row['comp_name'];
 $sub_array[] = $row['qs_id1'];
 $sub_array[] = $row['qs_id2'];
 $sub_array[] = $row['qs_id3'];

 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * from asses_teac";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'    => intval($_POST['draw']),
 'recordsTotal'  => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'    => $data
);

echo json_encode($output);

?>

