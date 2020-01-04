<?php

include 'query.php';
$sql = 'set @count=0;update table clients set clients.id = @count:= @count + 1;';
DB_query($sql);

$sql = 'alter table clients AUTO_INCREMENT = 1';
DB_query($sql);

$sql = 'select id from clients';
$result = DB_query($sql);

echo "<table><thead><tr><th>ID</th></tr></thead><tbody>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr><td>{$row[0]}</td></tr>";
}
echo "</tbody></table>";

?>