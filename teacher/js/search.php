<?php
    $conn = new mysqli("localhost", "root", "", "project102");
    $conn->set_charset('utf8');
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
</head>

<body>
    <form action="" method="get">
        Choose a major <select name="major" aria-placeholder="major" id="bo">
            <option>----major------</option>
            <?php
            $sql = "select distinct major from students order by major";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                if ($row['major'] == $_GET['major']) {
                    echo "<option selected>";
                } else {
                    echo "<option>";
                }

                echo "{$row['major']}</option>";
            }
            ?>
        </select>
        <br>
        <button typw="submit">Submit</button>
    </form>

    <?php

    $sql = "SELECT * FROM students LEFT JOIN company ON students.comp_id = company.comp_id WHERE students.major LIKE '{$_GET['major']}' ORDER BY major ;";

    $r = $conn->query($sql);
    if ($r->num_rows < 1) {
        echo "<h4 class='no'> No records found</h4>";
        die();
    }
    // echo "<h4 class='yes'>record count: {$r->num_rows} records </h4>";
    echo "<table>";
    echo "<tr>
    <th>ลำดับ</th>
    <th>รหัสนิสิต</th>
    <th>ชื่อ</th>
    <th>นามสกุล</th>
    <th>สาขา</th>
    <th>ชั้นปี</th>
    <th>สถานประกอบการ</th>
    <th>ตำแหน่งงาน</th>
    <th></th>
    <th>สถานะ</th>
    <th></th>
    <th></th>
    <th>หมายเหตุ</th>

     </tr>
    ";
    $i = 0;
    while ($data = $r->fetch_assoc()) {
        $i++;
        echo "<tr>
            <td>{$i}</td>
            <td>{$data['stu_id']}</td>
            <td>{$data['name']}</td>
            <td>{$data['lastname']}</td>
            <td>{$data['major']}</td>
            <td>{$data['year']}</td>
            <td>{$data['comp_name']}</td>
            <td>{$data['Job']}</td>
         
        </tr>
        ";
    }
    echo "</table>";



    ?>


</body>

</html>