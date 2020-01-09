<?php
//display-all
include 'query.php';
$date = date("Y-m-d");
$sql = "delete from clients where data_wizyty < '$date'";
if(DB_query($sql,TRUE)) {
    //echo "<div class='alert alert-success text-center' role='alert'><h4 class='alert heading'>Pomyślnie usunięto dane klienta!</h4></div>";
    header('location: http://localhost/clients/Action.php?succ=1&msg=removeold&date='.$date);
} else {
    //echo "<div class='alert alert-danger text-center' role='alert'><h4 class='alert heading'>Wystąpił błąd przy usuwaniu klienta!</h4></div>";
    header('location: http://localhost/clients/Action.php?succ=0&err=err');
}
?>