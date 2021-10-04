<?php 
    header('Content-Type: application/json');

    require_once 'connect.php';

    $sqlQuery = "SELECT count(stu_id) as count, major FROM students GROUP BY major ORDER BY count";
    $result = mysqli_query($conn, $sqlQuery);

    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($data);

?>