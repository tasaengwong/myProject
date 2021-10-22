<?php
include_once("db_connect.php");
if($_POST["query"] != '') {
	$searchData = explode(",", $_POST["query"]);
	$searchValues = "'" . implode("', '", $searchData) . "'";
	$queryQuery = "
		SELECT stu_id, name, lastname, major as major, Job, description 
		FROM students 
		WHERE major IN (".$searchValues.")";
} else {
	$queryQuery = "
	SELECT stu_id, name, lastname, major as major, Job, description 
		FROM students ";
}
$resultset = mysqli_query($conn, $queryQuery) or die("database error:". mysqli_error($conn));
$totalRecord = mysqli_num_rows($resultset);
$htmlRows = '';
if($totalRecord) {
 while( $developer = mysqli_fetch_assoc($resultset) ) {
  $htmlRows .= '
	  <tr>
	   <td>'.$developer["name"].'</td>
	   <td>'.$developer["lastname"].'</td>
	   <td>'.$developer["major"].'</td>
	   <td>'.$developer["Job"].'</td>
	   <td>'.$developer["description"].'</td>
  </tr>';
 }
} else {
	$htmlRows .= '
		<tr>
			<td colspan="5" align="center">No record found.</td>
		</tr>';
}
$data = array(
	"html" => $htmlRows		
);
echo json_encode($data);
