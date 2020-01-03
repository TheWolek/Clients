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
                    include 'query.php';

                    $output = '';

                    if($_POST['telefon'] != '' && $_POST['data'] != '' && $_POST['farba'] != '') {
                        $phone = $_POST['telefon'];
                        $date = $_POST['data'];
                        $color = $_POST['farba'];
                        
                        if(strlen($phone) != 9) {
                            $output = 'Podany numer telefonu jest nie poprawny';
                        } else {
                            $sql = "insert into clients (telefon,data_wizyty,numer_farby) values('$phone','$date','$color')";
                            if($result = DB_query($sql)) {
                                echo "Pomyślnie dodano nowego klienta";
                            } else {
                                echo "Błąd podczas dodawania klienta";
                            }
                        }
                    } else {
                        $output = 'Wypełnij wszystkie pola';
                    }           
                    echo $output;       
                ?>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>