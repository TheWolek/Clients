<?php
include 'query.php';
$ID = $_GET['ID'];

$sql = "select ID, imie_Nazwisko from clients where ID = $ID";
$resultsClients = DB_query($sql,false);
$output = '<div class="client-card">';

while($row=$resultsClients->fetch_assoc()) {
    $dane = ucwords($row['imie_Nazwisko']);
    $output = $output."<span class='client-id' id='client-id'>{$row['ID']}</span> <span class='client-name' id='client-name{$row['ID']}'>Imię i Nazwisko: $dane</span><div class='btn btn-primary client-proc-add' onclick='addProc({$row['ID']})'>Dodaj</div><div id='client-proc'>Zabiegi:";
    $sql = "select ID, IDKlienta, tresc from zabiegi where IDKlienta = {$row['ID']}";
    $resultsProc = DB_query($sql,false);
    $clientData = ["CID"=>$row['ID'],"dane"=>$dane];
    $dataOutput = [];
    while($rowP=$resultsProc->fetch_assoc()) {
        $data = ["ID"=>$rowP['ID'],"tresc"=>$rowP['tresc']];
        array_push($dataOutput,$data);
    }
}
echo json_encode(["clientData"=>$clientData,"procs"=>$dataOutput]);

?>