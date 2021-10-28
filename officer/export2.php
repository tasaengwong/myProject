<?php

//fetch.p

include('ex.php');

$column = array('qs_id', 'stu_id', 'name', 'lastname', 'major', 'comp_name', 'es_id1', 'es_id2', 'es_id3', 'es_id4', 'es_id5', 'es_id6', 'es_id7', 'es_id8', 'es_id9', 'es_id10', 'es_id11', 'es_id12');

$query = "SELECT * from asses";

if(isset($_POST['search']['value']))
{
 $query .= '
 WHERE qs_id LIKE "%'.$_POST['search']['value'].'%" 
 OR stu_id LIKE "%'.$_POST['search']['value'].'%" 
 OR name LIKE "%'.$_POST['search']['value'].'%" 
 OR lastname LIKE "%'.$_POST['search']['value'].'%" 
 OR comp_name LIKE "%'.$_POST['search']['value'].'%" 
 OR major LIKE "%'.$_POST['search']['value'].'%" 
 OR es_id1 LIKE "%'.$_POST['search']['value'].'%" 
 OR es_id2 LIKE "%'.$_POST['search']['value'].'%" 
 OR es_id3 LIKE "%'.$_POST['search']['value'].'%" 
 OR es_id4 LIKE "%'.$_POST['search']['value'].'%" 
 OR es_id5 LIKE "%'.$_POST['search']['value'].'%" 
 OR es_id6 LIKE "%'.$_POST['search']['value'].'%" 
 OR es_id7 LIKE "%'.$_POST['search']['value'].'%" 
 OR es_id8 LIKE "%'.$_POST['search']['value'].'%" 
 OR es_id9 LIKE "%'.$_POST['search']['value'].'%" 
 OR es_id10 LIKE "%'.$_POST['search']['value'].'%" 
 OR es_id11 LIKE "%'.$_POST['search']['value'].'%" 
 OR es_id12 LIKE "%'.$_POST['search']['value'].'%" 
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY qs_id DESC ';
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

//  $sub_array[] = $row['qs_id'];
 $sub_array[] = $row['stu_id'];
 $sub_array[] = $row['name'];
 $sub_array[] = $row['lastname'];
 $sub_array[] = $row['major'];
 $sub_array[] = $row['comp_name'];
 $sub_array[] = $row['es_id1'];
 $sub_array[] = $row['es_id2'];
 $sub_array[] = $row['es_id3'];
 $sub_array[] = $row['es_id4'];
 $sub_array[] = $row['es_id5'];
 $sub_array[] = $row['es_id6'];
 $sub_array[] = $row['es_id7'];
 $sub_array[] = $row['es_id8'];
 $sub_array[] = $row['es_id9'];
 $sub_array[] = $row['es_id10'];
 $sub_array[] = $row['es_id11'];
 $sub_array[] = $row['es_id12'];
//  $sub_array[] = $row['sum'];

 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * from asses";
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

