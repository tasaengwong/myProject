<?php
//export.php  
$connect = mysqli_connect("localhost", "root", "", "project103");
$output = '';
if (isset($_POST["export"])) {
    $query = "SELECT * FROM students LEFT JOIN company on students.comp_id = company.comp_id";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>Name</th>
                    <th>lastName</th>
                    <th>address</th>
                    <th>major</th>
                    <th>year</th>
                    <th>CompanyName</th>
                    </tr>
  ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
    <tr>  
    <td>' . $row["name"] . '</td> 
    <td>' . $row["lastname"] . '</td>   
    <td>' . $row["address"] . '</td>  
    <td>' . $row["major"] . '</td>  
    <td>' . $row["year"] . '</td>  
    <td>' . $row["comp_name"] . '</td>
                    </tr>
   ';
        }
        $output .= '</table>';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=download.xls');
        echo $output;
    }
}
