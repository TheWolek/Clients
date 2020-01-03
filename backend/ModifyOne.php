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
                    
                    $id = $_POST['id'];
                    $tel = $_POST['telefon'];
                    $data = $_POST['data'];
                    $farba = $_POST['farba'];
                    
                    $sql = "update clients set telefon = '$tel', data_wizyty = '$data', numer_farby = '$farba' where id = '$id'";

                    if(DB_query($sql)) {
                        echo "Pomyślnie zaktualizowano dane klienta";
                    } else {
                        echo "Błąd podczas aktualizowania danych";
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