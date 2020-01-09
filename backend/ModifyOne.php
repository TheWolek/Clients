<?php
//display-all
include 'query.php';

$id = $_POST['id'];
$dane = $_POST['dane'];
$data = $_POST['data'];
$farba = $_POST['farba'];

$sql = "update clients set imie_nazwisko = '$dane', data_wizyty = '$data', numer_farby = '$farba' where id = '$id'";
if(DB_query($sql,TRUE)) {
    //echo "<div class='alert alert-success text-center' role='alert'><h4 class='alert heading'>Pomyślnie zmodyfikowano dane klienta!</h4></div>";
    header('location: http://localhost/clients/Action.php?succ=1&msg=edit');
} else {
    //echo "<div class='alert alert-danger text-center' role='alert'><h4 class='alert heading'>Wystąpił błąd przy modyfikacji danych klienta!</h4></div>";
    header('location: http://localhost/clients/Action.php?succ=0&err=err');
}
?>