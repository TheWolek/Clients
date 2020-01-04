<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Klienci</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!--<link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" href="css/styl1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="background: #232930">
    <div class="container bg-dark vh-100">
        <div class="col baner text-light text-center">
            <h1>Wybierz akcje</h1>
        </div>
        <div class="col main">
            <div class="main-center">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="/clients/backend/display-all.php">Wszystko</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="ShowForm(1)" id="nav-1" href="../index.html">Znajdź klienta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="ShowForm(2)" id="nav-2" href="../index.html">Dodaj klienta </a>
                    </li>
                </ul> 
            </div>
        </div>
        <div class="col form h-50 pt-3 pd-3">
            <div class="row justify-content-around">
                <div class="col-6 align-self-center">
                <?php
                    //display-all
                    header("Content-Type: text/html;charset=UTF-8");
                    include 'query.php';
                    session_start();

                    if($_SESSION['page'] != 0) $page = $_SESSION['page'] - 1;
                    else $page = 1;
                    $_SESSION['page'] = $page;
                    $offset = $_SESSION['offset'] = $page * 2;

                    $sql = 'select count(*) from clients';
                    $result = DB_query($sql);
                    $result = $result->fetch_array();
                    $pageTotal = ceil($result[0] / 2);

                    $sql = 'select id, telefon, data_wizyty, numer_farby from clients order by data_wizyty limit 2 offset '.$offset;
                    //echo $sql;
                    $result = DB_query($sql);

                    if($result->num_rows > 0) {
                        $date = date("Y-m-d");
                        $curPage = $page + 1;
                        echo "Strona: ".$curPage." / ".$pageTotal."<br/>";
                        echo "<table class='table table-dark table-hover'><thead class='thead-dark'><tr><th>ID</th><th>Nr. telefonu</th><th>data ostatniej wizyty</th><th>numer farby</th></tr></thead></tbody>";
                        while($row=$result->fetch_assoc()) {
                            echo "<tr><td>{$row['id']}</td><td>{$row['telefon']}</td>";
                            if ($row['data_wizyty'] < $date) {
                                echo "<td class='pastDate'>{$row['data_wizyty']}</td>";
                            } else if($row['data_wizyty'] == $date) {
                                echo "<td class='todayDate'>{$row['data_wizyty']}</td>";
                            } else {
                                echo "<td>{$row['data_wizyty']}</td>";
                            }
                            echo "<td>{$row['numer_farby']}</td></tr>";
                        }
                        echo "</tbody></table>";
                        if($offset == 0) {
                            echo "<form action='nextPage.php' method='post' class='nav-form'><input type='submit' value='Next' class='form-control'/></form>";
                        } else {
                            echo "<form action='nextPage.php' method='post' class='nav-form'><input type='submit' value='Next' class='form-control'/></form><form action='prevPage.php' method='post' class='nav-form'><input type='submit' value='prev' class='form-control'/></form>";
                        }
                        
                    } else {
                        echo "Brak wyników<br/>";
                    }

                ?>
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
</body>
</html>
                
                