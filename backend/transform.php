<?php
include 'query.php';
$sql = 'select ID, numer_farby from clients';
$results = DB_query($sql,false);

while($row=$results->fetch_assoc()) {
    $zabiegi = explode("\n",$row['numer_farby']);
    for($i=0;$i<count($zabiegi);$i++) {
        $sql = "insert into zabiegi (IDklienta,tresc) values ({$row['ID']},'{$zabiegi[$i]}')";
        DB_query($sql,FALSE);
    }   
}

?>