<?php

//fetch.p

include('ex.php');

$column = array('csq_id ', 'stu_id', 'stu_n', 'stu_lsn', 'major_name', 'comp_name', 'cs_id1', 'cs_id2', 'cs_id3', 'cs_id4', 'cs_id5', 'cs_id6', 'cs_id7', 'cs_id8', 'cs_id9', 'cs_id10', 'cs_id11', 'cs_id12', 'cs_id13', 'cs_id14', 'cs_id15', 'cs_id16', 'cs_id17', 'cs_id18', 'cs_id19', 'cs_id20', 'cs_id21', 'cs_id22', 'cs_id23', 'cs_id24', 'cs_id25', 'cs_id26', 'cs_id27', 'cs_id28', 'cs_id29', 'cs_id30');

$query = "SELECT * from asses_comp";

if(isset($_POST['search']['value']))
{
 $query .= '
 WHERE csq_id  LIKE "%'.$_POST['search']['value'].'%" 
 OR stu_id LIKE "%'.$_POST['search']['value'].'%" 
 OR stu_n LIKE "%'.$_POST['search']['value'].'%" 
 OR stu_lsn LIKE "%'.$_POST['search']['value'].'%" 
 OR comp_name LIKE "%'.$_POST['search']['value'].'%" 
 OR major_name LIKE "%'.$_POST['search']['value'].'%" 
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY csq_id DESC ';
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
 $sub_array[] = $row['stu_n'];
 $sub_array[] = $row['stu_lsn'];
 $sub_array[] = $row['major_name'];
 $sub_array[] = $row['comp_name'];

 $sub_array[] = $row['cs_id1'];
 $sub_array[] = $row['cs_id2'];
 $sub_array[] = $row['cs_id3'];
 $sub_array[] = $row['cs_id4'];
 $sub_array[] = $row['sum1'];
 
 $sub_array[] = $row['cs_id5'];
 $sub_array[] = $row['cs_id6'];
 $sub_array[] = $row['cs_id7'];
 $sub_array[] = $row['cs_id8'];
 $sub_array[] = $row['cs_id9'];
 $sub_array[] = $row['cs_id10'];
 $sub_array[] = $row['sum2'];

 $sub_array[] = $row['cs_id11'];
 $sub_array[] = $row['cs_id12'];
 $sub_array[] = $row['cs_id13'];
 $sub_array[] = $row['cs_id14'];
 $sub_array[] = $row['cs_id15'];
 $sub_array[] = $row['sum3'];

 $sub_array[] = $row['cs_id16'];
 $sub_array[] = $row['cs_id17'];
 $sub_array[] = $row['cs_id18'];
 $sub_array[] = $row['cs_id19'];
 $sub_array[] = $row['cs_id20'];
 $sub_array[] = $row['sum4'];

 $sub_array[] = $row['cs_id21'];
 $sub_array[] = $row['cs_id22'];
 $sub_array[] = $row['cs_id23'];
 $sub_array[] = $row['cs_id24'];
 $sub_array[] = $row['sum5'];

 $sub_array[] = $row['cs_id25'];
 $sub_array[] = $row['cs_id26'];
 $sub_array[] = $row['cs_id27'];
 $sub_array[] = $row['sum6'];
 $sub_array[] = $row['total'];
 
 $sub_array[] = $row['cs_id28'];
 $sub_array[] = $row['cs_id29'];
 $sub_array[] = $row['cs_id30'];

 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * from asses_comp";
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

