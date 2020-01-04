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
<body style="background: #232930">
    <div class="container bg-dark vh-100">
        <div class="col baner text-light text-center">
            <h1>Wybierz akcje</h1>
        </div>
        <div class="col main">
            <div class="main-center">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="/clients/backend/display-all.php">Wszystko</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="ShowForm(1)" id="nav-1" href="/clients/index.html">Znajdź klienta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" onclick="ShowForm(2)" id="nav-2" href="/clients/index.html">Dodaj klienta </a>
                    </li>
                </ul> 
            </div>
        </div>
        <div class="col form h-50 pt-3 pd-3">
            <div class="row justify-content-around">
                <div class="col-6 align-self-center">
                <?php
                    include 'query.php';

                    $output = '';
                    //var_dump($_POST);
                    if($_POST['telefon'] != '' && $_POST['data'] != '' && $_POST['farba'] != '') {
                        $phone = $_POST['telefon'];
                        $date = $_POST['data'];
                        $color = $_POST['farba'];
                        
                        if(strlen($phone) != 9) {
                            $output = 'Podany numer telefonu jest nie poprawny';
                        } else {
                            $sql = "insert into clients (telefon,data_wizyty,numer_farby) values('$phone','$date','$color')";
                            if($result = DB_query($sql)) {
                                echo "<p class='text-light'>Pomyślnie dodano nowego klienta</p>";
                            } else {
                                echo "<p class='text-light'>Błąd podczas dodawania klienta</p>";
                            }
                        }
                    } else {
                        $output = '<p class="text-light">Wypełnij wszystkie pola</p>';
                    }           
                    echo $output;       
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
    <script src="../js/displayOne.js"></script>
</body>
</html>
                
                