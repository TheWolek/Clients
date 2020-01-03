<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <title>Klienci</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="wrap">
        <div class="baner">
            <h1>Cała lista</h1>
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
                    header("Content-Type: text/html;charset=UTF-8");
                    include 'query.php';
                    session_start();
                    
                    $page = $_SESSION['page'] + 1;
                    $_SESSION['page'] = $page;
                    $offset = $_SESSION['offset'] = $page * 2;

                    $sql = 'select count(*) from clients';
                    $result = DB_query($sql);
                    $result = $result->fetch_array();
                    $pageTotal = ceil($result[0] / 2);

                    $sql = 'select id, telefon, data_wizyty, numer_farby from clients order by data_wizyty limit 2 offset '.$offset;
                    //echo $sql;
                    $curPage = $page + 1;
                    echo "Strona: ".$curPage." / ".$pageTotal."<br/>";
                    $result = DB_query($sql);

                    if($result->num_rows > 0) {
                        $offset = '0';
                        $date = date("Y-m-d");
                        echo "<table><tr><th>ID</th><th>Nr. telefonu</th><th>data ostatniej wizyty</th><th>numer farby</th></tr>";
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
                        echo "</table>";
                        if($curPage == $pageTotal) 
                            echo "<form action='prevPage.php' method='post' class='nav-form'><input type='submit' value='prev' class='nav-btn'/></form>";
                        else
                            echo "<form action='nextPage.php' method='post' class='nav-form'><input type='submit' value='Next' class='nav-btn'/></form><form action='prevPage.php' method='post' class='nav-form'><input type='submit' value='prev' class='nav-btn'/></form>";
                    } else {
                        echo "Brak wyników<br/>";
                    }
                  
                ?>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>