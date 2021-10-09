<?php
$connect = mysqli_connect("localhost", "root", "", "project103");
$sql = "SELECT * FROM students LEFT JOIN company on students.comp_id = company.comp_id";
$result = mysqli_query($connect, $sql);
?>
<html>

<head>
    <title>Export  Excel </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>

</head>

<body>
    <div class="container">
        <br />
        <br />
        <br />
        <div class="table-responsive">
            <h2 align="center">Export MySQL data to Excel in PHP</h2><br />
            <table class="table table-bordered" id="excel">
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