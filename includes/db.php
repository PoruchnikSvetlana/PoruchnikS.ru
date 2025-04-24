<?php
$conn = pg_connect("host=localhost dbname=PoruchnikS user=postgres password=password");
if (!$conn) {
    die("Ошибка подключения: " . pg_last_error());
}
?>

