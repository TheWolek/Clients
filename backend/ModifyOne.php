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
    <div class="container bg-dark vh-100 p-4">
        <div class="col baner text-light text-center">
            <h1>Zmodyfikowano klienta</h1>
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
        <div class="col form h-50 pt-3 pd-3">
            <div class="row justify-content-around">
                <div class="col-sm-8 align-self-center">
                <?php
                    //display-all
                    include 'query.php';
                    
                    $id = $_POST['id'];
                    $tel = $_POST['telefon'];
                    $data = $_POST['data'];
                    $farba = $_POST['farba'];
                    
                    $sql = "update clients set telefon = '$tel', data_wizyty = '$data', numer_farby = '$farba' where id = '$id'";

                    if(DB_query($sql)) {
                        echo "<div class='alert alert-success text-center' role='alert'><h4 class='alert heading'>Pomyślnie zmodyfikowano dane klienta!</h4></div>";
                    } else {
                        echo "<div class='alert alert-danger text-center' role='alert'><h4 class='alert heading'>Wystąpił błąd przy modyfikacji danych klienta!</h4></div>";
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
    <script src="../js/displayOne.js"></script>
</body>
</html>
                
                