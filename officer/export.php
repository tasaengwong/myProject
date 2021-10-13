<?php

//fetch.p

include('ex.php');

$column = array('stu_id', 'name', 'lastname', 'major', 'year', 'comp_name');

$query = "SELECT * from students LEFT JOIN  company ON students.comp_id = company.comp_id";

if(isset($_POST['search']['value']))
{
 $query .= '
 WHERE stu_id LIKE "%'.$_POST['search']['value'].'%" 
 OR name LIKE "%'.$_POST['search']['value'].'%" 
 OR lastname LIKE "%'.$_POST['search']['value'].'%" 
 OR major LIKE "%'.$_POST['search']['value'].'%" 
 OR year LIKE "%'.$_POST['search']['value'].'%" 
 OR address LIKE "%'.$_POST['search']['value'].'%" 
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY stu_id DESC ';
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
 $sub_array[] = $row['stu_id'];
 $sub_array[] = $row['name'];
 $sub_array[] = $row['lastname'];
 $sub_array[] = $row['major'];

 $sub_array[] = $row['year'];
 $sub_array[] = $row['address'];
 $sub_array[] = $row['comp_name'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * from students LEFT JOIN  company on students.comp_id = company.comp_id";
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