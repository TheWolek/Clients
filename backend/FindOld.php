<?php
//display-all
include 'query.php';
$output = '';
$counter = 0;
$date = date("Y-m-d");

$sql = 'select id, imie_nazwisko, data_wizyty, numer_farby from clients where data_wizyty < "'.$date.'"';
//echo $sql."<BR/>";
$result = DB_query($sql,FALSE);
if(@$result->num_rows > 0) {
    echo "<div id='FResults' class='table-responsive'>";
    echo $output;
    echo "<table class='table table-dark table-hover'><thead class='thead-dark'><tr><th></th><th>ID</th><th>imie i nazwisko</th><th>data ostatniej wizyty</th><th>numer farby</th><th>Akcje</th></tr></thead><tbody>";
    while($row=$result->fetch_assoc()) {
        $dane = ucwords($row['imie_nazwisko']);
        echo "<tr><td><input type='checkbox' name='select' value='{$row['id']}'></td><td id='idRow{$row['id']}'>{$row['id']}</td><td id='DaneRow{$row['id']}'>{$dane}</td><td id='dataRow{$row['id']}'>{$row['data_wizyty']}</td><td id='farbaRow{$row['id']}'>{$row['numer_farby']}</td>";
        echo "<td><div class='action-flex'><input type='button' onClick='findOne({$row['id']})' class='btn btn-info' value='Edytuj'/><input type='button' onClick='deleteOne({$row['id']})' class='btn btn-danger ml-2' value='Usuń'/></div></td></tr>";
    }
    echo "</tbody></table></div>";
} else {
    echo "<div id='FResults' class='text-light'>$output <br/>Brak wyników</div>";
}

?>