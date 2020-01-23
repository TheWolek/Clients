<?php
//session_start();
include 'query.php';

$sql = 'select count(*) from clients';
$result = DB_query($sql,FALSE);
$result = $result->fetch_array();
$pageTotal = ceil($result[0] / 4);

$sql = 'select id, imie_nazwisko, data_wizyty, numer_farby from clients order by data_wizyty';
$result = DB_query($sql,FALSE);

if($result->num_rows > 0) {
    $date = date("Y-m-d");
    echo "<div id='FResults'><div class='page-counter text-light' id='pageCounter'></div>";
    echo "<table class='table table-dark table-hover'><thead class='thead-dark'><tr><th>ID</th><th>Imie i nazwisko</th><th>data wizyty</th><th>numer farby</th><th>Akcje</th></tr></thead><tbody>";
    while($row=$result->fetch_assoc()) {
        $dane = ucwords($row['imie_nazwisko']);
        echo "<tr><td id='idRow{$row['id']}'>{$row['id']}</td><td id='DaneRow{$row['id']}'>{$dane}</td>";
    if ($row['data_wizyty'] < $date) {
        echo "<td><span id='dataRow{$row['id']}'>{$row['data_wizyty']}</span><span class='badge badge-danger ml-1'>Stary</span></td>";
    } else if($row['data_wizyty'] == $date) {
        echo "<td><span id='dataRow{$row['id']}'>{$row['data_wizyty']}</span><span class='badge badge-success ml-1'>Dzisiaj</span></td>";
    } else {
        echo "<td><span id='dataRow{$row['id']}'>{$row['data_wizyty']}</span></td>";
    }
    $color = nl2br($row['numer_farby']);
    echo "<td id='farbaRow{$row['id']}'>{$color}</td><td><div class='action-flex'><input type='button' onClick='findOne({$row['id']})' class='btn btn-info' value='Edytuj'/><input type='button' onClick='deleteOne({$row['id']})' class='btn btn-danger ml-2' value='Usuń'/></div></td></tr>";
}
    echo "</tbody></table></div>";
} else {
    echo "<p class='text-light'>Brak wyników</p>";
}                 
?>