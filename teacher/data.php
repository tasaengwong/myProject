<?php 
    header('Content-Type: application/json');

    require_once 'connect.php';

    $sqlQuery = "SELECT count(stu_id) as count, students.major_id , major.major_name FROM students LEFT JOIN major ON students.major_id = major.major_id GROUP BY major_id ORDER BY count";
    $result = mysqli_query($conn, $sqlQuery);

    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }

    mysqli_close($conn);

    echo json_encode($data);

?>