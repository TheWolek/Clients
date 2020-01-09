<?php

function DB_query($sql,$save) {
    require('db.php');

    @$conn = new mysqli($DBhost,$DBuser,$DBpass,$DBname);
    if($conn->set_charset("utf-8")) echo "utf-8 loaded<br/>";

    if($conn->connect_error) {
        die('Connection failed: '.$conn->connect_error);
    }

    $conn->query("set names 'utf-8'");
    if($save === TRUE) {
        $conn->query('delete from clients_backup');
        $conn->query('insert into clients_backup select * from clients');
    }
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

?>