<?php
$dsn = "mysql:host=localhost;dbname=userdata";
$username = "root";
$password = "";
try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    echo "Произошла ошибка при попытке подключения: " . $e->getMessage();
}
?>