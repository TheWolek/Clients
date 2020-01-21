<?php
include 'query.php';
$selected = json_decode($_GET['selected']);
$length = count($selected);
$sql = "delete from clients where id = ";
DB_query("select id from clients",TRUE);

foreach($selected as $id) {
    $localSql = $sql.(Int)$id;
    echo $localSql." ";

    DB_query($localSql,FALSE);
}

header('location: /clients/Action.php?succ=1&msg=removeselected&len='.$length);
?>