<?php
$Option = [
    PDO::ATTR_PERSISTENT => TRUE,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];
try {
    $con = new PDO('mysql:host=localhost;dbname=phpblog;charset=utf8', 'root', '', $Option);

} catch (PDOException $error) {
    echo 'Error' . $error->getMessage();
}