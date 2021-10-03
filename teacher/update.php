<?php
    include "headeer.php";
    $sql = "UPDATE students SET 
        Id_students = '{$d->Id_students}',
        titlename = '{$d->titlename}',
        name = '{$d->name}',
        lastname= '{$d->lastname}',
        major = '{$d->major}',
        year = '{$d->year}',
        address = '{$d->address}',
        amphueres = '{$d->amphueres}',
         = '{$d->}',
         = '{$d->}',
         = '{$d->}',
         = '{$d->}',
         = '{$d->}',
         = '{$d->}',
         = '{$d->}',
         = '{$d->}',
         = '{$d->}',
         = '{$d->}',
         = '{$d->}',
         = '{$d->}',
         = '{$d->}',
         = '{$d->}';
        ";
        if($conn->query($sql) === true){
            $sql ="select * from students left join company on students.comp_id = company.comp_id "
        }
?>