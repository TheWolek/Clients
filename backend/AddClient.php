<?php
include 'query.php';

$output = '';
//var_dump($_POST);
if($_POST['telefon'] != '' && $_POST['data'] != '' && $_POST['farba'] != '') {
    $phone = $_POST['telefon'];
    $date = $_POST['data'];
    $color = $_POST['farba'];
                        
    if(strlen($phone) != 9) {
        //$output = "<div class='alert alert-danger text-center' role='alert'><h4 class='alert heading'>Podany numer telefonu jest nie poprawny!</h4></div>";
        header('location: http://localhost/clients/Action.php?succ=0&err=phone');
    } else {
            $sql = "insert into clients (telefon,data_wizyty,numer_farby) values('$phone','$date','$color')";
        if($result = DB_query($sql)) {
            //echo "<div class='alert alert-success text-center' role='alert'><h4 class='alert heading'>Pomyślnie dodano nowego klienta!</h4></div>";
            header('location: http://localhost/clients/Action.php?succ=1&msg=new');
        } else {
            //echo "<div class='alert alert-danger text-center' role='alert'><h4 class='alert heading'>Wystąpił błąd przy dodwaniu klienta!</h4></div>";
            header('location: http://localhost/clients/Action.php?succ=0&err=err');
        }
    }
} else {
    header('location: http://localhost/clients/Action.php?succ=0&err=fields');
    //$output = "<div class='alert alert-danger text-center' role='alert'><h4 class='alert heading'>Wypełnij wszystkie pola!</h4></div>";
}           
//echo $output;       
?>           
                