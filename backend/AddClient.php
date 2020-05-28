<?php
include 'query.php';

$output = '';
if($_POST['imie_nazwisko'] != '') {
    $data = mb_strtolower($_POST['imie_nazwisko']);
                        
        $sql = "insert into clients (imie_nazwisko) values('$data')";
        if($result = DB_query($sql,TRUE)) {
            $sql = 'select ID from clients where imie_nazwisko like "'. $data.'"';
            $result = DB_query($sql,FALSE);
            while($row = $result->fetch_assoc()) {
                echo json_encode(["status" => true, "CID" => $row['ID']]);
            }
        } else {
            echo json_encode(["status" => false, "err" => "DBerr"]);
        }
    }
} else {
    echo json_encode(["status" => false, "err" => "fields"]);
}                 
?>           
                