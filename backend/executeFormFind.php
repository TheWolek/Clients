<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Klienci</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!--<link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" href="../css/styl1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container bg-dark h-100 p-4">
        <div class="col baner text-light text-center">
            <h1>Wynik wyszukania</h1>
        </div>
        <div class="col main">
            <div class="main-center">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="/clients/index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/clients/backend/display-all.php">Wszystko</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" onclick="ShowForm(1)" id="nav-1" href="/clients/find.html">Znajdź klienta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="ShowForm(2)" id="nav-2" href="/clients/create.html">Dodaj klienta </a>
                    </li>
                </ul> 
            </div>
        </div>
        <div class="col form vh-50 pt-3 pd-3">
            <div class="row justify-content-around">
                <div class="col-sm-8 align-self-center">
                <form action="/clients/backend/executeFormFind.php" method="post">
                    <div class="form-group">
                        <input type="number" name="telefon" placeholder="telefon" class="form-control"/>
                    </div>    
                    <div class="form-group">
                        <input type="text" name="kolor" placeholder="kolor" class="form-control"/>
                    </div> 
                    <div class="form-group">
                        <input type="date" name="data_wizyty" class="form-control" id="data"/>
                    </div>
                    <div class="form-group">
                        <input type="button" value="wczoraj" onclick="FormSetDate(-1)" class="btn btn-secondary"/>
                        <input type="button" value="dzisiaj" onclick="FormSetDate(0)" class="btn btn-secondary"/>
                        <input type="button" value="jutro" onclick="FormSetDate(1)" class="btn btn-secondary"/>
                    </div>
                    <input type="submit" value="Znajdź" class="btn btn-primary"/>
                </form>
                <a href="/clients/backend/executeFormOld.php" class="btn btn-secondary mt-2">Znajdź stare</a>
                <div class="table-responsive">
                <?php
                    //display-one
                    include 'query.php';

                    $condition = '';
                    $output = '';
                    $counter = 0;
                    if(isset($_POST['telefon']) && $_POST['telefon'] != '') {
                        $telefon = $_POST['telefon'];
                        if($counter > 0) $condition = $condition." or ";
                        $condition = $condition."telefon='$telefon'";
                        $counter++;
                        $output = $output."telefon: ".$telefon;
                    }
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
                        echo "<div class='text-light'>".$output."</div>";
                        echo "<table class='table table-dark table-hover'><thead class='thead-dark'><tr><th>ID</th><th>Nr. telefonu</th><th>data ostatniej wizyty</th><th>numer farby</th><th>Edytuj</th><th>Usuń</th></tr></thead></tbody>";
                        while($row=$result->fetch_assoc()) {
                            echo "<tr><td id='idRow'>{$row['id']}</td><td id='telefonRow'>{$row['telefon']}</td><td id='dataRow'>{$row['data_wizyty']}</td><td id='farbaRow'>{$row['numer_farby']}</td>";
                            echo '<td><input type="button" onClick="findOne()" class="btn btn-info" value="Edytuj"/></td><td><input type="button" onClick="deleteOne()" class="btn btn-danger" value="Usuń"/></td></tr>';
                        }
                        echo "</tbody></table></div>";
                    } else {
                        echo "<div id='area' class='text-light'>$output <br/>Brak wyników</div>";
                    }
                  
                ?>    
                </div>
                </div>
            </div>
        </div>
        <div class="col text-center">
            <img src="../img/logo.png" alt="logo" class="img-fluid ">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../js/ShowForm.js"></script>
    <script src="../js/addClient.js"></script>
    <script src="../js/displayOne.js"></script>
    <script src="../js/deleteOne.js"></script>
</body>
</html>
                