<?php
//display-one
include 'query.php';
$condition = '';
$output = '';
$counter = 0;
if(isset($_POST['imie_nazwisko']) && $_POST['imie_nazwisko'] != '') {
    $imie_nazwisko = strtolower($_POST['imie_nazwisko']);
    if($counter > 0) $condition = $condition." or ";
    $condition = $condition." imie_nazwisko like '%$imie_nazwisko%'";
    $counter++;
    $output = $output."imie nazwisko: ".$imie_nazwisko;
}
if(isset($_POST['kolor']) && $_POST['kolor'] != '') {
    $color = $_POST['kolor'];
    if($counter > 0) $condition = $condition." or ";
    $condition = $condition." numer_farby like '%$color%'";
    $counter++;
    $output = $output." kolor: ".$color;
}
if(isset($_POST['data_wizyty']) && $_POST['data_wizyty'] != '') {
    $date = $_POST['data_wizyty'];
    if($counter > 0) $condition = $condition." or ";
    $condition = $condition."data_wizyty='$date'";
    $counter++;
    $output = $output." data: ".$date;
}

$sql = 'select id, imie_nazwisko, data_wizyty, numer_farby from clients where '.$condition;
//echo $sql."<BR/>";
$result = DB_query($sql,FALSE);
if(@$result->num_rows > 0) {
    echo "<div class='table-responsive' id='FResults'>";
    echo "<div class='text-light'>".$output."</div>";
    echo "<table class='table table-dark table-hover'><thead class='thead-dark'><tr><th>ID</th><th>imie i nazwisko</th><th>data ostatniej wizyty</th><th>numer farby</th><th>Edytuj</th><th>Usuń</th></tr></thead></tbody>";
    while($row=$result->fetch_assoc()) {
        $dane = ucwords($row['imie_nazwisko']);
        echo "<tr><td id='idRow{$row['id']}'>{$row['id']}</td><td id='DaneRow{$row['id']}'>{$dane}</td><td id='dataRow{$row['id']}'>{$row['data_wizyty']}</td><td id='farbaRow{$row['id']}'>{$row['numer_farby']}</td>";
        echo "<td><input type='button' onClick='findOne({$row['id']})' class='btn btn-info' value='Edytuj'/></td><td><input type='button' onClick='deleteOne({$row['id']})' class='btn btn-danger' value='Usuń'/></td></tr>";
    }
    echo "</tbody></table></div>";
} else {
    echo "<div id='FResults' class='text-light'>$output <br/>Brak wyników</div>";
}

?>