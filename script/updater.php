<?php
// Script for editing (Скрипт для редактирования)
include ("database.php");

$postName = $_POST['postname'];
$newName = $_POST['newname'];
$newData = $_POST['newdata'];

$id = $_POST['id'];
$sql = "UPDATE `posts` SET `postname` = :new_name, `postdata` = :new_data WHERE `id` = '$id'";
$sth = $pdo->prepare($sql); // Preparing before sending (Подготовка перед отправкой)
// Filtration variables (method protection against SQL-injection) (Фильтрация переменных (метод защиты от SQL-инъекций))
$sth->bindParam(':new_name', $newName, PDO::PARAM_STR);
$sth->bindParam(':new_data', $newData, PDO::PARAM_STR);
$sth->execute(); // Sending (Отправка)

// Redirect to start.php page (Редирект на страницу start.php)
header('Location: start.php');
?>