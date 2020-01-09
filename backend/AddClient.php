<?php
include 'query.php';

$output = '';
//var_dump($_POST);
if($_POST['imie_nazwisko'] != '' && $_POST['data'] != '' && $_POST['farba'] != '') {
    $data = $_POST['imie_nazwisko'];
    $date = $_POST['data'];
    $color = $_POST['farba'];
                        
        $sql = "insert into clients (imie_nazwisko,data_wizyty,numer_farby) values('$data','$date','$color')";
        if($result = DB_query($sql,TRUE)) {
            //echo "<div class='alert alert-success text-center' role='alert'><h4 class='alert heading'>Pomyślnie dodano nowego klienta!</h4></div>";
            header('location: http://localhost/clients/Action.php?succ=1&msg=new');
        } else {
            //echo "<div class='alert alert-danger text-center' role='alert'><h4 class='alert heading'>Wystąpił błąd przy dodwaniu klienta!</h4></div>";
            header('location: http://localhost/clients/Action.php?succ=0&err=err');
        }
} else {
    header('location: http://localhost/clients/Action.php?succ=0&err=fields');
    //$output = "<div class='alert alert-danger text-center' role='alert'><h4 class='alert heading'>Wypełnij wszystkie pola!</h4></div>";
}           
//echo $output;       
?>           
                