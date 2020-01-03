<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Klienci</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="wrap">
        <div class="baner">
            <h1>Wynik wyszukiwania</h1>
        </div>
        <div class="main">
            <div class="main-center">
                <a href="../index.html">powrót</a>
            </div>
        </div>
        <div class="form">
            <div class="form-center">
                <?php
                    //display-all
                    include 'query.php';

                    $condition = '';
                    $output = '';
                    $counter = 0;

                    if(isset($_POST['kolor']) && $_POST['kolor'] != '') {
                        $color = $_POST['kolor'];
                        if($counter > 0) $condition = $condition." or ";
                        $condition = $condition."numer_farby='$color'";
                        $counter++;
                        $output = $output."kolor: ".$color;
                    }
                    if(isset($_POST['data_wizyty']) && $_POST['data_wizyty'] != '') {
                        $date = $_POST['data_wizyty'];
                        if($counter > 0) $condition = $condition." or ";
                        $condition = $condition."data_wizyty='$date'";
                        $counter++;
                        $output = $output."data: ".$date;
                    }
                    
                    $sql = 'select id, telefon, data_wizyty, numer_farby from clients where '.$condition;
                    //echo $sql."<BR/>";
                    $result = DB_query($sql);

                    if(@$result->num_rows > 0) {
                        echo "<div id='area'>";
                        echo $output;
                        echo "<table><tr><th>ID</th><th>Nr. telefonu</th><th>data ostatniej wizyty</th><th>numer farby</th><th>Edytuj</th><th>Usuń</th></tr>";
                        while($row=$result->fetch_assoc()) {
                            echo "<tr><td id='idRow'>{$row['id']}</td><td id='telefonRow'>{$row['telefon']}</td><td id='dataRow'>{$row['data_wizyty']}</td><td id='farbaRow'>{$row['numer_farby']}</td>";
                            echo '<td><input type="button" onClick="findOne()" class="input-btn" value="Edytuj"/></td><td><input type="button" onClick="deleteOne()" class="input-btn" value="Usuń"/></td></tr>';
                        }
                        echo "</table></div>";
                    } else {
                        echo "<div id='area'>$output <br/>Brak wyników</div>";
                    }
                  
                ?>
            </div>
        </div>
        <div class="footer"></div>
    </div>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/displayOne.js"></script>
    <script src="../js/deleteOne.js"></script>
</body>
</html>