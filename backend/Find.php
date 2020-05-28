<?php
//display-one
include 'query.php';
$condition = '';
$output = '';
$counter = 0;
if(isset($_POST['imie_nazwisko']) && $_POST['imie_nazwisko'] != '') {
    $imie_nazwisko = mb_strtolower($_POST['imie_nazwisko']);
    if($counter > 0) $condition = $condition." or ";
    $condition = $condition."telefon='$telefon'";
    $counter++;
    $output = $output."telefon: ".$telefon;
}

$sql = 'select id, imie_nazwisko from clients where '.$condition;
$result = DB_query($sql,FALSE);
if(@$result->num_rows > 0) {
    echo "<div class='table-responsive' id='FResults'>";
    echo "<div class='text-light'>".$output."</div>";
    echo "<table class='table table-dark table-hover'><thead class='thead-dark'><tr><th>ID</th><th>imie i nazwisko</th><th>Akcje</th></tr></thead></tbody>";
    while($row=$result->fetch_assoc()) {
        $dane = ucwords($row['imie_nazwisko']);
        echo "<tr><td id='idRow{$row['id']}'>{$row['id']}</td><td id='DaneRow{$row['id']}'>{$dane}</td>";
        echo "<td><div class='action-flex'><input type='button' onClick='findOne({$row['id']})' class='btn btn-info' value='Edytuj'/><input type='button' onClick='deleteOne({$row['id']})' class='btn btn-danger ml-2' value='Usuń'/></div></td></tr>";
    }
    echo "</tbody></table></div>";
} else {
    echo "<div id='FResults' class='text-light'>$output <br/>Brak wyników <br/> <button class='btn btn-info' onClick='addClientFromFind()'>Dodaj klienta</button></div>";
}

?>