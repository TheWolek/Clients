<?php
include 'query.php';

if($_POST['klient'] != '') {
    $client = $_POST['klient'];                    
    $sql = "delete from zabiegi where ID=$client";
    if($result = DB_query($sql,TRUE)) {
        echo json_encode(["status"=>true,"IDC"=>$client]);
    } else {
        echo json_encode(["status"=>false]);
    }
} else {
    echo json_encode(["status"=>false]);
}
?>