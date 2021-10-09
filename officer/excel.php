<?php
    /*กำหนด username password และ database name ของ mysql */
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project103";

    /*------เชื่อมต่อ Database----*/
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
      die("Connection Error: " . $conn->connect_error);
    }

 /*สร้างปุ่มสำหรับ Download ไฟล์ excel โดยกำหนดว่าเมื่อกดปุ่ม Downlaod แล้วจะทำงานที่ javascript function ชื่อว่า ExcelReport()*/
     echo "<a href='#' id='download_link' onClick='javascript:ExcelReport();''>Download</a>";

    echo "<table id='myTable'>";
         echo "<tr>";
                echo "<td>Name</td>";
                echo "<td>Last</td>";
        echo "</tr>";
    /*นำข้อมูลจากตาราง food มาแสดง*/
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
    {
        echo "<tr>";
            echo "<td>$row[name]</td>";
            echo "<td>$row[lastname]</td>";
        echo "</tr>";
    }
    echo "</table>";

    $conn->close();

?>
<!-- เรียกใช้ javascript สำหรับ export ไฟล์ excel  -->
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"  ></script>
<script src="https://unpkg.com/file-saver@1.3.3/FileSaver.js"  ></script>

<script>
function ExcelReport()//function สำหรับสร้าง ไฟล์ excel จากตาราง
{
    var sheet_name="excel_sheet";/* กำหหนดชื่อ sheet ให้กับ excel โดยต้องไม่เกิน 31 ตัวอักษร */
    var elt = document.getElementById('myTable');/*กำหนดสร้างไฟล์ excel จาก table element ที่มี id ชื่อว่า myTable*/

    /*------สร้างไฟล์ excel------*/
    var wb = XLSX.utils.table_to_book(elt, {sheet: sheet_name});
    XLSX.writeFile(wb,'report.xlsx');//Download ไฟล์ excel จากตาราง html โดยใช้ชื่อว่า report.xlsx
}
</script>
<style type="text/css">

table {
  border-collapse: collapse;
  width:40%;
}

table, th, td {
  border: 1px solid black;
}

</style>