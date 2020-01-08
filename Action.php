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
<body>
    <div class="container bg-dark h-100 p-4">
        <div class="col-sm baner text-light text-center">
            <h1 id="header">Wybierz akcje</h1>
        </div>
        <div class="col form h-50 pt-3 pd-3">
                <div class="row justify-content-around">
                    <?php
                        if($_GET['succ'] == 1) {
                            if(isset($_GET['msg'])) {
                                $msg = $_GET['msg'];
                                if($msg == 'new') {
                                    echo "<div class='alert alert-success text-center' role='alert'><h4 class='alert heading'>Pomyślnie dodano nowego klienta!</h4></div>";
                                } else if($msg == 'edit') {
                                    echo "<div class='alert alert-success text-center' role='alert'><h4 class='alert heading'>Pomyślnie zmodyfikowano dane klienta!</h4></div>";
                                } else if($msg == 'remove') {
                                    echo "<div class='alert alert-success text-center' role='alert'><h4 class='alert heading'>Pomyślnie usunięto dane klienta!</h4></div>";
                                }
                            }
                        } else {
                            if(isset($_GET['err'])) {
                                $msg = $_GET['err'];
                                if($msg == 'phone') {
                                    echo "<div class='alert alert-danger text-center' role='alert'><h4 class='alert heading'>Podany numer telefonu jest nie poprawny!</h4></div>";
                                } else if($msg == 'err') {
                                    echo "<div class='alert alert-danger text-center' role='alert'><h4 class='alert heading'>Wystąpił błąd z pozyskaniem wyników</h4></div>";
                                } else if($msg == 'fields') {
                                    echo "<div class='alert alert-danger text-center' role='alert'><h4 class='alert heading'>Wypełnij wszystkie pola!</h4></div>";
                                }
                            }
                        }
                    ?>
                </div>
        </div>
        <div class="col text-center mt-3">
            <img src="img/logo.png" alt="logo" class="img-fluid ">
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/redirect.js"></script>
</body>
</html>