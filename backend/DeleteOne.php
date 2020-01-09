<?php
//display-all
include 'query.php';
$id = $_POST['id'];
$sql = "delete from clients where id = '$id'";
if(DB_query($sql,TRUE)) {
    //echo "<div class='alert alert-success text-center' role='alert'><h4 class='alert heading'>Pomyślnie usunięto dane klienta!</h4></div>";
    header('location: /clients/Action.php?succ=1&msg=remove');
} else {
    //echo "<div class='alert alert-danger text-center' role='alert'><h4 class='alert heading'>Wystąpił błąd przy usuwaniu klienta!</h4></div>";
    header('location: /clients/Action.php?succ=0&err=err');
}
?>                