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
        <div class="col-sm baner text-light text-center">
            <h1 id="header">Wybierz akcje</h1>
        </div>
        <div class="col main">
            <div class="main-center">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="/clients/index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="ShowResults()" id="nav-0" href="#">Wszystko</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="ShowForm(1)" id="nav-1" href="#">Znajdź klienta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="ShowForm(2)" id="nav-2" href="#">Dodaj klienta </a>
                    </li>
                </ul> 
            </div>
        </div>
        <div class="col form h-50 pt-3 pd-3">
                <div class="row justify-content-around">
                    <div id="form1" class="col-sm-8" style="display: block;">
                        <form action="/clients/backend/Find.php" method="post">
                            <div class="form-group">
                                <input type="number" name="telefon" placeholder="telefon" class="form-control"/>
                            </div> 
                            <div class="form-group">
                                <input type="text" name="kolor" placeholder="kolor" class="form-control"/>
                            </div> 
                            <div class="form-group">
                                <input type="date" name="data_wizyty" class="form-control" id="data" placeholder="data wizyty"/>
                            </div>
                            <div class="form-group">
                                <input type="button" value="wczoraj" onclick="FormSetDate(-1)" class="btn btn-secondary"/>
                                <input type="button" value="dzisiaj" onclick="FormSetDate(0)" class="btn btn-secondary"/>
                                <input type="button" value="jutro" onclick="FormSetDate(1)" class="btn btn-secondary"/>
                            </div>
                            <input type="submit" value="Znajdź" class="btn btn-primary"/>
                        </form>
                        <a href="/clients/backend/FindOld.php" class="btn btn-secondary mt-2">Znajdź stare</a>
                <?php
                    //display-all
                    include 'query.php';

                    $output = '';
                    $counter = 0;

                    $date = date("Y-m-d");
                    
                    $sql = 'select id, telefon, data_wizyty, numer_farby from clients where data_wizyty < "'.$date.'"';
                    //echo $sql."<BR/>";
                    $result = DB_query($sql);

                    if(@$result->num_rows > 0) {
                        echo "<div id='FResults' class='table-responsive'>";
                        echo $output;
                        echo "<table class='table table-dark table-hover'><thead class='thead-dark'><tr><th>ID</th><th>Nr. telefonu</th><th>data ostatniej wizyty</th><th>numer farby</th><th>Edytuj</th><th>Usuń</th></tr></thead><tbody>";
                        while($row=$result->fetch_assoc()) {
                            echo "<tr><td id='idRow{$row['id']}'>{$row['id']}</td><td id='telefonRow{$row['id']}'>{$row['telefon']}</td><td id='dataRow{$row['id']}'>{$row['data_wizyty']}</td><td id='farbaRow{$row['id']}'>{$row['numer_farby']}</td>";
                            echo "<td><input type='button' onClick='findOne({$row['id']})' class='btn btn-info' value='Edytuj'/></td><td><input type='button' onClick='deleteOne({$row['id']})' class='btn btn-danger' value='Usuń'/></td></tr>";
                        }
                        echo "</tbody></table></div>";
                    } else {
                        echo "<div id='FResults' class='text-light'>$output <br/>Brak wyników</div>";
                    }
                  
                ?>    
                </div>
                    <div id="form2" class="col-sm-8" style="display: none;">
                            <form action="/clients/backend/AddClient.php" method="post">
                                <div class="form-group">
                                    <label for="telefonA" class="text-light">Telefon</label>
                                    <input type="number" id="telefonA" name="telefon" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="data_wizytyA" class="text-light">Data wizyty</label>
                                    <input type="date" id="data_wizytyA" name="data" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="numer_farbyA" class="text-light">Numer Farby</label>
                                    <input type="text" id="numer_farbyA" name="farba" class="form-control">
                                </div>
                                <p class="text-light" style="display: none;" id="AddSureText">Klient zostanie dodany do bazy. Jesteś pewien?</p>
                                <input type="submit" value="Dodaj" class="btn btn-primary" style="display: none;" id="AddSureBtn">
                            </form>
                            <input type="button" value="Dodaj" onclick="addClient()" class="btn btn-primary" id="AddBtn"/>
                    </div>
                    <div class="col-sm-8">
                        <div class="table-responsive" id="Results">
                        
                        </div>
                    </div>
                </div>
        </div>
        <div class="col text-center mt-3">
            <img src="../img/logo.png" alt="logo" class="img-fluid ">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.1/jquery.min.js"></script>
    <script src="../js/ShowForm.js"></script>
    <script src="../js/ShowResults.js"></script>
    <script src="../js/addClient.js"></script>
    <script src="../js/ToggleElements.js"></script>
    <script src="../js/displayOne.js"></script>
    <script src="../js/deleteOne.js"></script>
</body>
</html>