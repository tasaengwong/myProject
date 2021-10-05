<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

if($_POST["query"] != '')
{
 $search_array = explode(",", $_POST["query"]);
 $search_text = "'" . implode("', '", $search_array) . "'";
 $query = "SELECT * from students LEFT JOIN company ON students.comp_id = company.comp_id WHERE major IN (".$search_text.") ORDER BY stu_id DESC";
}
else
{
 $query = "SELECT * from students LEFT JOIN company ON students.comp_id = company.comp_id DESC";
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '';

if($total_row > 0)
{
 foreach($result as $data)
 {
  $output .= '
  <tr>
   <td>'.$data["name"].'</td>
   <td>'.$data["lastname"].'</td>
   <td>'.$data["major"].'</td>
   <td>'.$data["year"].'</td>
   <td>'.$data["comp_name"].'</td>
  </tr>
  ';
 }
}
else
{
 $output .= '
 <tr>
  <td colspan="5" align="center">No Data Found</td>
 </tr>
 ';
}

echo $output;


?>

