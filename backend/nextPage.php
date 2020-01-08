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
            <h1>Wszyscy klienci</h1>
        </div>
        <div class="col main">
            <div class="main-center">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="/clients/index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/clients/backend/display-all.php">Wszystko</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="ShowForm(1)" id="nav-1" href="../find.html">Znajdź klienta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="ShowForm(2)" id="nav-2" href="../create.html">Dodaj klienta </a>
                    </li>
                </ul> 
            </div>
        </div>
        <div class="col form h-50 pt-3 pd-3">
            <div class="row justify-content-around">
                <div class="col-sm-8 align-self-center">
                <div class="table-responsive">
                <?php
                    //display-all
                    header("Content-Type: text/html;charset=UTF-8");
                    include 'query.php';
                    session_start();
                    
                    $page = $_SESSION['page'] + 1;
                    $_SESSION['page'] = $page;
                    $offset = $_SESSION['offset'] = $page * 4;

                    $sql = 'select count(*) from clients';
                    $result = DB_query($sql);
                    $result = $result->fetch_array();
                    $pageTotal = ceil($result[0] / 4);

                    $sql = 'select id, telefon, data_wizyty, numer_farby from clients order by data_wizyty limit 4 offset '.$offset;
                    //echo $sql;
                    $curPage = $page + 1;
                    echo "<div class='page-counter text-light'>Strona: ".$curPage." / ".$pageTotal."</div>";
                    $result = DB_query($sql);

                    if($result->num_rows > 0) {
                        $offset = '0';
                        $date = date("Y-m-d");
                        echo "<table class='table table-dark table-hover'><thead class='thead-dark'><tr><th>ID</th><th>Nr. telefonu</th><th>data ostatniej wizyty</th><th>numer farby</th><th>Edytuj</th><th>Usuń</th></tr></thead><tbody>";
                        while($row=$result->fetch_assoc()) {
                            echo "<tr><td>{$row['id']}</td><td>{$row['telefon']}</td>";
                            if ($row['data_wizyty'] < $date) {
                                echo "<td><span id='dataRow'>{$row['data_wizyty']}</span><span class='badge badge-danger ml-1'>Stary</span></td>";
                            } else if($row['data_wizyty'] == $date) {
                                echo "<td><span id='dataRow'>{$row['data_wizyty']}</span><span class='badge badge-success ml-1'>Dzisiaj</span></td>";
                            } else {
                                echo "<td><span id='dataRow'>{$row['data_wizyty']}</span></td>";
                            }
                            echo "<td>{$row['numer_farby']}</td><td><input type='button' onClick='findOne()' class='btn btn-info' value='Edytuj'/></td><td><input type='button' onClick='deleteOne()' class='btn btn-danger' value='Usuń'/></td></tr>";
                        }
                        echo "</tbody></table>";
                        if($curPage == $pageTotal) 
                            echo "<form action='prevPage.php' method='post' class='nav-form'><input type='submit' value='prev' class='btn btn-primary'/></form>";
                        else
                            echo "<form action='nextPage.php' method='post' class='nav-form'><input type='submit' value='Next' class='btn btn-primary'/></form><form action='prevPage.php' method='post' class='nav-form'><input type='submit' value='prev' class='btn btn-primary mt-1'/></form>";
                    } else {
                        echo "<p class='text-light'>Brak wyników</p>";
                    }
                  
                ?>
                </div>
                <div id="area" class="text-center mt-2"></div>
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
                