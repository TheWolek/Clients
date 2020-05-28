<?php
include 'query.php';

if($_POST['zabieg'] != '' && $_POST['klient'] != '') {
    $zabieg = $_POST['zabieg'];
    $client = $_POST['klient'];                    
    $sql = "insert into zabiegi (IDKlienta,tresc) values($client,'$zabieg')";
    if($result = DB_query($sql,TRUE)) {
        $sql = "select ID from zabiegi where IDKlienta = $client and tresc like '$zabieg'";
        $IDResult = DB_query($sql,FALSE);
        $row=$IDResult->fetch_assoc();
        $output = ["status"=>TRUE,"idZ"=>$row['ID'],"tresc"=>$zabieg,"IDC"=>$client];
        echo json_encode($output);
    } else {
        echo json_encode(["status"=>false]);
    }
} else {
    echo json_encode(["status"=>false]);
} 


?>