<?php
include 'query.php';

if($_POST['zabieg'] != '' && $_POST['klient'] != '') {
    $zabieg = $_POST['zabieg'];
    $client = $_POST['klient'];                    
    $sql = "update zabiegi set tresc='$zabieg' where ID=$client";
    if($result = DB_query($sql,TRUE)) {
        echo json_encode(["status"=>true,"IDZ"=>$client,"tresc"=>$zabieg]);
    } else {
        echo json_encode(["status"=>false]);
    }
} else {
    echo json_encode(["status"=>false]);
} 


?>