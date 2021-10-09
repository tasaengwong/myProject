<?php
$connect = mysqli_connect("localhost", "root", "", "project103");
$sql = "SELECT * FROM students LEFT JOIN company on students.comp_id = company.comp_id";
$result = mysqli_query($connect, $sql);
?>
<html>

<head>
    <title>Export MySQL data to Excel in PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <br />
        <br />
        <br />
        <div class="table-responsive">
            <h2 align="center">Export MySQL data to Excel in PHP</h2><br />
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>lastName</th>
                    <th>address</th>
                    <th>major</th>
                    <th>year</th>
                    <th>CompanyName</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo '  
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
                ?>
            </table>
            <br />
            <form method="post" action="export.php">
                <input type="submit" name="export" class="btn btn-success" value="Export" />
            </form>
        </div>
    </div>
</body>

</html>