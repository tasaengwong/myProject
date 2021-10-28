<?php

//fetch.p

include('ex.php');

$column = array('stu_id', 'name', 'lastname', 'major', 'year', 'address', 'province', 'amphures', 'district'
, 'zipcode', 'phone', 'mail', 'Job', 'description', 'study', 'sent', 'sentmail', 'comp_name'
, 'contract_name', 'comp_address', 'comp_subdis', 'comp_amphure', 'comp_province', 'comp_zipcode', 'comp_phone', 'comp_mail', 'comp_Fax'
, 'date', 'time');

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
 OR province LIKE "%'.$_POST['search']['value'].'%"
 OR amphures LIKE "%'.$_POST['search']['value'].'%"
 OR district LIKE "%'.$_POST['search']['value'].'%"
 OR zipcode LIKE "%'.$_POST['search']['value'].'%"
 OR phone LIKE "%'.$_POST['search']['value'].'%"
 OR mail LIKE "%'.$_POST['search']['value'].'%"
 OR Job LIKE "%'.$_POST['search']['value'].'%"
 OR description LIKE "%'.$_POST['search']['value'].'%"
 OR study LIKE "%'.$_POST['search']['value'].'%"
 OR sent LIKE "%'.$_POST['search']['value'].'%"
 OR sentmail LIKE "%'.$_POST['search']['value'].'%"
 OR comp_name LIKE "%'.$_POST['search']['value'].'%"
 OR contract_name LIKE "%'.$_POST['search']['value'].'%"
 OR comp_address LIKE "%'.$_POST['search']['value'].'%"
 OR comp_subdis LIKE "%'.$_POST['search']['value'].'%"
 OR comp_amphure LIKE "%'.$_POST['search']['value'].'%"
 OR comp_province LIKE "%'.$_POST['search']['value'].'%"
 OR comp_zipcode LIKE "%'.$_POST['search']['value'].'%"
 OR comp_phone LIKE "%'.$_POST['search']['value'].'%"
 OR comp_mail LIKE "%'.$_POST['search']['value'].'%"
 OR comp_Fax LIKE "%'.$_POST['search']['value'].'%"
 OR date LIKE "%'.$_POST['search']['value'].'%"
 OR time LIKE "%'.$_POST['search']['value'].'%"
 
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
 $sub_array[] = $row['date'];
 $sub_array[] = $row['time'];
 $sub_array[] = $row['address'];
 $sub_array[] = $row['province'];
 $sub_array[] = $row['amphures'];
 $sub_array[] = $row['district'];
 $sub_array[] = $row['zipcode'];
 $sub_array[] = $row['phone'];
 $sub_array[] = $row['mail'];
 $sub_array[] = $row['Job'];
 $sub_array[] = $row['description'];
//  $sub_array[] = $row['comp_id '];
 $sub_array[] = $row['study'];
 $sub_array[] = $row['sent'];
 $sub_array[] = $row['sentmail'];


 $sub_array[] = $row['comp_name'];
 $sub_array[] = $row['contract_name'];
 $sub_array[] = $row['comp_address'];
 $sub_array[] = $row['comp_subdis'];
 $sub_array[] = $row['comp_amphure'];
 $sub_array[] = $row['comp_province'];
 $sub_array[] = $row['comp_zipcode'];
 $sub_array[] = $row['comp_phone'];
 $sub_array[] = $row['comp_mail'];
 $sub_array[] = $row['comp_Fax'];

 $sub_array[] = $row['status'];

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

