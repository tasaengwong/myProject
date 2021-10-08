<?php 
    header('Content-Type: application/json');

    require_once 'connect.php';

    $sqlQuery = "SELECT students.comp_id, company.comp_name, count(*) as count FROM students JOIN company ON students.comp_id = company.comp_id group by students.comp_id";
    $result = mysqli_query($conn, $sqlQuery);

    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($data);

?>