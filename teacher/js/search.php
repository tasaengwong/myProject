<!DOCTYPE html>
<html>

<head>
    <meta charset="utf8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head>

<body>
    <?php
    $conn = new mysqli("localhost", "root", "", "project103");
    $conn->set_charset('utf8');
    ?>
    <form action="" method="get">
        <select name="major" aria-placeholder="major" id="major" onchange="showCustomer(this.value)">
            <option>สาขา</option>
            <?php
            $sql = "select * from students order by major";
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
        <button type="submit">Submit</button>

    </form>

    <?php
    $sql = "SELECT * FROM students LEFT JOIN company ON students.comp_id = company.comp_id WHERE major LIKE '{$_GET['major']}' ORDER BY major ;";
    $result = $conn->query($sql);
    if ($result->num_rows < 1) {
        echo "<h4 class='no'> No records found</h4>";
        die();
    }
    ?>
    <table class="table" id="txtHint">
        <table class="table table-striped">
            <tr>
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
         
            
            <?php
            $i = 0;
            while ($data = $result->fetch_assoc()) {
                $i++;
            ?>

                <form>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['stu_id']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['lastname']; ?></td>
                    <td><?php echo $data['major']; ?></td>
                    <td><?php echo $data['year']; ?></td>
                    <td><?php echo $data['comp_name']; ?></td>
                    <td><?php echo $data['Job']; ?></td>
                    <td>
                    <td>
                        <?php
                        if ($data['status'] == 0) {
                        } elseif ($data['status'] == 1) {
                            echo '<p stu_id=' . $data['stu_id'] . '&status="0"  class ="text text-success fa fa-check">อนุมัติ</a></p>';
                        } else {
                            echo '<p stu_id=' . $data['stu_id'] . '&status="2"  class="text text-danger fa fa-times">ไม่อนุมัติ</p>';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($data['status'] == 0) {
                            echo '<p><a href="change.php?stu_id=' . $data['stu_id'] . '&status=1" class= "btn btn-outline-success">อนุมัติ</a></p>';
                        }
                        ?>
                    <td>
                        <?php
                        if ($data['status'] == 0) {
                            echo '<p><a href="change.php?stu_id=' . $data['stu_id'] . '&status=2"  class= "btn btn-outline-danger">ไม่อนุมัติ</a></p>';
                        }
                        ?>
                    </td>
                    </td>
                    <td>
                        <a href="#edit<?php echo $data['stu_id']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>เพิ่มเติม</a>
                        <?php include('../button.php'); ?>
                    </td>
                    </tr>
                <?php } ?>
        </table>
    </table>

<script>
    function showCustomer(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("txtHint").innerHTML = this.responseText;
  }
  xhttp.open("GET", "getcustomer.php?q="+str);
  xhttp.send();
}
</script>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>