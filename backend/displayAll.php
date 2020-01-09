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
    echo "<table class='table table-dark table-hover'><thead class='thead-dark'><tr><th>ID</th><th>Imie i nazwisko</th><th>data ostatniej wizyty</th><th>numer farby</th><th>Edytuj</th><th>Usuń</th></tr></thead><tbody>";
    while($row=$result->fetch_assoc()) {
        echo "<tr><td id='idRow{$row['id']}'>{$row['id']}</td><td id='DaneRow{$row['id']}'>{$row['imie_nazwisko']}</td>";
    if ($row['data_wizyty'] < $date) {
        echo "<td><span id='dataRow{$row['id']}'>{$row['data_wizyty']}</span><span class='badge badge-danger ml-1'>Stary</span></td>";
    } else if($row['data_wizyty'] == $date) {
        echo "<td><span id='dataRow{$row['id']}'>{$row['data_wizyty']}</span><span class='badge badge-success ml-1'>Dzisiaj</span></td>";
    } else {
        echo "<td><span id='dataRow{$row['id']}'>{$row['data_wizyty']}</span></td>";
    }
    echo "<td id='farbaRow{$row['id']}'>{$row['numer_farby']}</td><td><input type='button' onClick='findOne({$row['id']})' class='btn btn-info' value='Edytuj'/></td><td><input type='button' onClick='deleteOne({$row['id']})' class='btn btn-danger' value='Usuń'/></td></tr>";
}
    echo "</tbody></table></div>";
} else {
    echo "<p class='text-light'>Brak wyników</p>";
}                 
?>