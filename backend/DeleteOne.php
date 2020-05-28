<?php
//display-all
include 'query.php';
$id = $_POST['id'];
$sql = "delete from clients where id = $id";
$sql2 = "delete from zabiegi where IDKlienta= $id";
if(DB_query($sql,TRUE) && DB_query($sql2,TRUE)) {
    echo json_encode(["status" => true]);
} else {
    echo json_encode(["status" => false]);
}
?>                